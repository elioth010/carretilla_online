<?php

class OrderController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $orders = Order::orderBy('user_id')->get();
        return View::make("admin.order.list", array("orders" => $orders));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $carts = Cart::content();
        if(Cart::count()<1){
            Session::flash('flash_error', 'You need add at least one product!');
        }
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->date = date('Y-m-d h:i:s');
        $order->total = money_format('%.2n', Cart::total());
        $order->save();
        foreach ($carts as $row) {
            $product = Product::find($row->id)->firstOrFail();

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product->code;
            $orderDetail->quantity = $row->qty;
            $orderDetail->sub_total = money_format('%.2n', $row->subtotal);
            $orderDetail->save();
            Cart::destroy();
        }

        Session::flash('message', 'Successfully created order!');
        return Redirect::to('orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $order = Order::find($id);
        return View::make('admin.order.show')->with('order', $order);
    }

    public function myOrderShow($id) {
        $order = Order::find($id);
        return View::make('ordersdetail')->with('order', $order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $order = Order::find($id);
        return View::make('admin.order.delete')->with('order', $order);
    }
    
     public function myOrderDestroy($id) {
        $order = Order::find($id);
        return View::make('ordersdelete')->with('order', $order);
    }

    public function delete($id) {
        $order = Order::find($id);
        foreach ($order->detail()->getResults() as $detail) {
            $detail->softDeletes();
        }
        $order->softDeletes();
        // redirect
        Session::flash('message', 'Successfully deleted the product!');
        return Redirect::to('orders');
    }

    public function viewCart() {
        $cart = Cart::content();
        return View::make("cart", array("cart" => $cart));
    }

    public function addToCart() {
        $product = Product::where('code', '=', Input::get('product'))->firstOrFail();
        Cart::add($product->code, $product->name, 1, $product->price);
        Session::flash('message', 'Successfully ' . $product->name . ' attached to the basket');
        return Redirect::to('product');
    }

    public function removeToCart() {
        $product = Product::where('code', '=', Input::get('product'))->firstOrFail();

        $rowId = Cart::search(array('id' => $product->code));
        Cart::remove($rowId[0]);
        Session::flash('message', 'Successfully ' . $product->name . ' deattached to the basket');
        return Redirect::to('product');
    }

    public function getMyOrders() {
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();
        return View::make('orders')->with('orders', $orders);
    }

}
