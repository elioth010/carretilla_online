<?php

class AccessController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($idMenu) {
        $adminMenus = AdministrationMenu::find($idMenu);
        return View::make("admin.access.list", array("idMenu" => $idMenu, "roles" => $adminMenus->roles()->groupBy('id')->get()));
        //var_dump();
    }

    public function show($idMenu, $id) {
        $adminMenu = AdministrationMenu::find($idMenu);
        $role = Role::find($id);
        return View::make('admin.access.show', array('role' => $role, 'adminMenu' => $adminMenu));
    }

    public function edit($idMenu, $id) {
        $adminMenu = AdministrationMenu::find($idMenu);
        $role = Role::find($id);
        return View::make('admin.access.edit', array('role' => $role, 'adminMenu' => $adminMenu));
    }

    public function update($idMenu, $id) {
        $rules = array(
            'actions' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/access/' . $idMenu . '/edit' . $id)->withErrors($validator)->withInput();
        } else {
            // store
            $adminMenu = AdministrationMenu::find($idMenu);
            $role = Role::find(Input::get('role'));
            $oldRole = Role::find(Input::get('oldRole'));
            
            foreach (Action::all() as $action) {
                DB::table('actions_roles_menu')->where('action_id', '=', $action->id)->where('role_id', '=', $oldRole->id)->where('menu_admin_id', '=', $adminMenu->id)->softDeletes();
            }

            foreach (Input::get('actions') as $actionId) {
                DB::table('actions_roles_menu')->insert(
                        array('action_id' => $actionId, 'role_id' => $role->id, 'menu_admin_id' => $adminMenu->id)
                );
            }

            // redirect
            Session::flash('message', 'Successfully updated access!');
            return Redirect::to('admin/access/' . $adminMenu->id);
        }
    }

    public function store($idMenu) {

        $rules = array(
            'role' => 'required',
            'actions' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/access/' . $idMenu . '/create')->withErrors($validator)->withInput();
        } else {
            // store
            $adminMenu = AdministrationMenu::find($idMenu);
            $role = Role::find(Input::get('role'));
            
            foreach (Input::get('actions') as $actionId) {
                DB::table('actions_roles_menu')->insert(
                        array('action_id' => $actionId, 'role_id' => $role->id, 'menu_admin_id' => $adminMenu->id)
                );
            }
            // redirect
            Session::flash('message', 'Successfully created menu!');
            return Redirect::to('admin/access/' . $idMenu);
        }
    }

    public function destroy($idMenu, $id) {
        $adminMenu = AdministrationMenu::find($idMenu);
        $role = Role::find($id);
        
        foreach (Action::all() as $action) {
            DB::table('actions_roles_menu')->where('action_id', '=', $action->id)->where('role_id', '=', $role->id)->where('menu_admin_id', '=', $adminMenu->id)->softDeletes();
        }

        // redirect
        Session::flash('message', 'Successfully deleted the menu!');
        return Redirect::to('admin/access/' . $adminMenu->id);
    }

    public function delete($idMenu, $id) {
        $adminMenu = AdministrationMenu::find($idMenu);
        $role = Role::find($id);
        return View::make('admin.access.delete', array('role' => $role, 'adminMenu' => $adminMenu));
    }

    public function create($idMenu) {
        return View::make('admin.access.create', array("idMenu" => $idMenu));
    }

}
