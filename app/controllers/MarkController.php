<?php

class MarkController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $marks = Mark::orderBy('name')->get();
        return View::make("admin.mark.list", array("marks" => $marks));
    }

    public function show($id) {
        $mark = Mark::find($id);
        return View::make('admin.mark.show')->with('mark', $mark);
    }

    public function edit($id) {
        $mark = Mark::find($id);
        return View::make('admin.mark.edit')->with('mark', $mark);
    }

    public function store() {
        $rules = array(
            'code' => 'required|min:3|numeric',
            'name' => 'required',
            'range_initial' => 'required|min:8',
            'range_final' => 'required|min:8',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/mark/create')->withErrors($validator)->withInput();
        } else {
            // store
            $mark = new Mark();
            $mark->code = Input::get('code');
            $mark->name = Input::get('name');
            $mark->product_range_initial = Input::get('range_initial');
            $mark->product_range_final = Input::get('range_final');
            $mark->save();

            // redirect
            Session::flash('message', 'Successfully created mark!');
            return Redirect::to('admin/mark');
        }
    }

    public function update($id) {
        $rules = array(
            'code' => 'required|min:3|max:3|numeric|unique:code',
            'name' => 'required',
            'range_initial' => 'required|min:8|unique',
            'range_final' => 'required|min:8|unique',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/mark/create')->withErrors($validator)->withInput();
        } else {
            // store
            $mark = Mark::find($id);
            $mark->code = Input::get('code');
            $mark->name = Input::get('name');
            $mark->product_range_initial = Input::get('range_initial');
            $mark->product_range_final = Input::get('range_final');
            $mark->save();

            // redirect
            Session::flash('message', 'Successfully updated mark!');
            return Redirect::to('admin/mark');
        }
    }

    public function create() {
        return View::make('admin.mark.create');
    }

    public function destroy($id) {
        $mark = Mark::find($id);
        return View::make('admin.mark.delete')->with('mark', $mark);
    }

    public function delete($id) {
        $mark = Mark::find($id);
        $mark->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the mark!');
        return Redirect::to('admin/mark');
    }

}
