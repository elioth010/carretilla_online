<?php

class UserController extends BaseController {

    //protected $layout 

    public function index() {
        $users = User::where('id', '<>', Auth::user()->id)->get();
        //$users = User::all();
        return View::make("admin.user.list", array("users" => $users));
    }

    public function show($id) {
        $user = User::find($id);
        return View::make('admin.user.show')->with('user', $user);
    }

    public function edit($id) {
        $user = User::find($id);
        return View::make('admin.user.edit')->with('user', $user);
    }

    public function store() {
        $rules = array(
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'age' => 'required|numeric',
            'roles' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/user/create')->withErrors($validator)->withInput();
        } else {
            // store            
            $user = new User();
            $user->name = Input::get('name');
            $user->password = Hash::make(Input::get('password'));
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->age = Input::get('age');
            $user->save();

            foreach (Input::get('roles') as $roleId) {
                $user->roles()->attach($roleId);
            }
            // redirect
            Session::flash('message', 'Successfully created user!');
            return Redirect::to('admin/user');
        }
    }

    public function update($id) {
         $rules = array(
            'username' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'age' => 'required|numeric',
            'roles' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/user/' . $id . '/edit')->withErrors($validator)->withInput();
        } else {
            // store
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->email = Input::get('email');
            $user->age = Input::get('age');
            $user->save();

            foreach (Role::all() as $role) {
                $user->roles()->detach($role->id);
            }
            foreach (Input::get('roles') as $roleId) {
                $found = false;
                foreach ($user->roles()->getResults() as $roleMenu) {
                    if ($roleMenu->id === $roleId) {
                        $found = true;
                    }
                }
                if (!$found) {
                    $user->roles()->attach($roleId);
                }
            }
            // redirect
            Session::flash('message', 'Successfully updated user!');
            return Redirect::to('admin/user');
        }
    }

    public function create() {
        return View::make('admin.user.create');
    }

    public function destroy($id) {
        $user = User::find($id);
        return View::make('admin.user.delete')->with('user', $user);
    }

    public function delete($id) {
        $user = User::find($id);

        foreach ($user->roles()->getResults() as $role) {
            $user->roles()->detach($role->id);
        }

        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the user!');
        return Redirect::to('admin/user');
    }

    public function showProfile() {
        return View::make('profile');
    }

}
