<?php

class CategoryController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $categorys = Category::orderBy('name')->get();
        return View::make("admin.category.list", array("categories" => $categorys));
    }

    public function show($id) {
        $category = Category::find($id);
        return View::make('admin.category.show')->with('category', $category);
    }

    public function edit($id) {
        $category = Category::find($id);
        return View::make('admin.category.edit')->with('category', $category);
    }

    public function store() {
        $rules = array(
            'name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('category/create')->withErrors($validator)->withInput();
        } else {
            // store
            $category = new Category();
            $category->name = Input::get('name');
            $category->save();

            // redirect
            Session::flash('message', 'Successfully created category!');
            return Redirect::to('admin/category');
        }
    }

    public function update($id) {
        $rules = array(
            'name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/category/' . $id . '/edit')->withErrors($validator)->withInput();
        } else {
            // store
            $category = Category::find($id);
            $category->name = Input::get('name');
            $category->save();

            // redirect
            Session::flash('message', 'Successfully updated category!');
            return Redirect::to('admin/category');
        }
    }

    public function create() {
        return View::make('admin.category.create');
    }

    public function destroy($id) {
        $category = Category::find($id);
        return View::make('admin.category.delete')->with('category', $category);
    }

    public function delete($id) {
        $category = Category::find($id);

        $category->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the category!');
        return Redirect::to('admin/category');
    }

}
