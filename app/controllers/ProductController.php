<?php

class ProductController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $products = Product::orderBy('code')->get();
        return View::make("admin.product.list", array("products" => $products));
    }

    public function show($id) {
        $product = Product::where('code', '=', $id)->firstOrFail();
        return View::make('admin.product.show')->with('product', $product);
    }

    public function edit($id) {
        $product = Product::where('code', '=', $id)->firstOrFail();
        //$product = new Product();
        return View::make('admin.product.edit')->with('product', $product);
    }

    public function store() {
        $rules = array(
            'code' => 'required',
            'name' => 'required',
            'mark' => 'required',
            'price' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'categories' => 'required',
            'product_image' => 'mimes:jpeg,bmp,png'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/product/create')->withErrors($validator)->withInput();
        } else {
            // store
            $filename = "";
            if (Input::hasFile('product_image')) {
                if (Input::file('product_image')->isValid()) {
                    Input::file('product_image')->move(ProductController::imagePath());
                    $filename = Input::file('product_image')->getClientOriginalName();
                }
            }
            $product = new Product();
            $product->code = Input::get('code');
            $product->mark = Input::get('mark');
            $product->name = Input::get('name');
            if ($filename !== "") {
                $product->image = ProductController::imagePath() . $filename;
            }
            $product->price = Input::get('price');
            $product->save();

            foreach (Input::get('categories') as $catId) {
                DB::table('products_category')->insert(
                        array('product_id' => Input::get('code'), 'category_id' => $catId)
                );
            }
            // redirect
            Session::flash('message', 'Successfully created product!');
            return Redirect::to('admin/product');
        }
    }

    public function update($id) {
        $rules = array(
            'code' => 'required',
            'name' => 'required',
            'price' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'categories' => 'required',
            'product_image' => 'mimes:jpeg,bmp,png'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/product/' . $id . '/edit')->withErrors($validator)->withInput();
        } else {
            // store
            $filename = "";
            if (Input::hasFile('product_image')) {
                if (Input::file('product_image')->isValid()) {
                    Input::file('product_image')->move(ProductController::imagePath());
                    $filename = Input::file('product_image')->getClientOriginalName();
                }
            }
            Product::where('code', '=', $id)->update(['code' => Input::get('code')]);
            Product::where('code', '=', $id)->update(['name' => Input::get('name')]);
            if ($filename !== "") {
                Product::where('code', '=', $id)->update(['image' => ProductController::imagePath() . $filename]);
            }
            Product::where('code', '=', $id)->update(['price' => Input::get('price')]);

            $product = Product::where('code', '=', $id)->firstOrFail();
            foreach (Category::all() as $cat) {
                DB::table('products_category')->where('product_id', '=', $product->code)->where('category_id', '=', $cat->id)->delete();
            }
            foreach (Input::get('categories') as $catId) {
                DB::table('products_category')->insert(
                        array('product_id' => $product->code, 'category_id' => $catId)
                );
            }
            // redirect
            Session::flash('message', 'Successfully updated product!');
            return Redirect::to('admin/product');
        }
    }

    public function create() {
        return View::make('admin.product.create');
    }

    public function destroy($id) {
        $product = Product::where('code', '=', $id)->firstOrFail();
        return View::make('admin.product.delete')->with('product', $product);
    }

    public function delete($id) {
        $product = Product::where('code', '=', $id)->firstOrFail();

        foreach (Category::all() as $cat) {
            DB::table('products_category')->where('product_id', '=', $product->code)->where('category_id', '=', $cat->id)->delete();
        }

        $product->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the product!');
        return Redirect::to('admin/product');
    }

    final public static function imagePath() {
        return '/home/elioth010/PHPWorkspace/carretilla_online/public/web/images/product/';
    }
    
    
    //GENERAL View
    
    public function listProducts() {
        $products = Product::orderBy('code')->get();
        return View::make("product", array("products" => $products));
    }
}
