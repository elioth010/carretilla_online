<?php

class RoleController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $roles = Role::orderBy('name')->get();
        return View::make("admin.role.list", array("roles" => $roles));
    }

    public function show($id) {
        $role = Role::find($id);
        return View::make('admin.role.show')->with('role', $role);
    }

    public function edit($id) {
        $role = Role::find($id);
        return View::make('admin.role.edit')->with('role', $role);
    }

    public function store() {
        $rules = array(
            'name' => 'required',
            'description' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/role/create')->withErrors($validator)->withInput();
        } else {
            // store
            $role = new Role();
            $role->name = Input::get('name');
            $role->description = Input::get('description');
            $role->save();

            // redirect
            Session::flash('message', 'Successfully created role!');
            return Redirect::to('admin/role');
        }
    }

    public function update($id) {
        $rules = array(
            'name' => 'required',
            'description' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/role/' . $id . '/edit')->withErrors($validator)->withInput();
        } else {
            // store
            $role = Role::find($id);
            $role->name = Input::get('name');
            $role->description = Input::get('description');
            $role->save();

            // redirect
            Session::flash('message', 'Successfully updated role!');
            return Redirect::to('admin/role');
        }
    }

    public function create() {
        return View::make('admin.role.create');
    }

    public function destroy($id) {
        $role = Role::find($id);
        return View::make('admin.role.delete')->with('role', $role);
    }

    public function delete($id) {
        $role = Role::find($id);
        $role->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the role!');
        return Redirect::to('admin/role');
    }
}
