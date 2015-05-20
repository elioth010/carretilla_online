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
        $product = Product::find($id);
        return View::make('admin.product.show')->with('product', $product);
    }

    public function edit($id) {
        $product = Product::find($id);
        return View::make('admin.product.edit')->with('product', $product);
    }

    public function store() {
        $rules = array(
            'code' => 'required|unique:code',
            'name' => 'required',
            'mark' => 'required',
            'price' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'categories' => 'required',
            'product_image' => 'mimes:jpeg,bmp,png'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('product/create')->withErrors($validator)->withInput();
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
            if ($filename !== "") {
                $product->image = ProductController::imagePath() . $filename;
            }
            $product->price = Input::get('price');
            $product->save();

            foreach (Input::get('categories') as $catId) {
                $product->categories()->attach($catId);
            }
            // redirect
            Session::flash('message', 'Successfully created product!');
            return Redirect::to('admin/product');
        }
    }

    public function update($id) {
        $rules = array(
            'code' => 'required|unique:code',
            'name' => 'required',
            'mark' => 'required',
            'price' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'categories' => 'required',
            'product_image' => 'mimes:jpeg,bmp,png'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('product/create')->withErrors($validator)->withInput();
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
            if ($filename !== "") {
                $product->image = ProductController::imagePath() . $filename;
            }
            $product->price = Input::get('price');
            $product->save();

            foreach (Category::all() as $cat) {
                $product->categories()->detach($cat->id);
            }
            foreach (Input::get('categories') as $catId) {
                $found = false;
                foreach ($product->roles()->getResults() as $roleProduct) {
                    if ($roleProduct->id === $catId) {
                        $found = true;
                    }
                }
                if (!$found) {
                    $product->categories()->attach($catId);
                }
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
        $product = Product::find($id);
        return View::make('admin.product.delete')->with('product', $product);
    }

    public function delete($id) {
        $product = Product::find($id);

        foreach ($product->categories()->getResults() as $cat) {
            $product->categories()->detach($cat->id);
        }

        $product->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the product!');
        return Redirect::to('admin/product');
    }

    final public static function imagePath() {
        return '/home/elioth010/PHPWorkspace/carretilla_online/public/web/images/product/';
    }

}
