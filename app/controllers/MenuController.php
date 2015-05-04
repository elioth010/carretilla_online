<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuController
 *
 * @author elioth010
 */
class MenuController extends Controller {

    protected $layout = 'layout';

    static public function getMenus() {

        $menus = Menu::all();
        $userMenu = array();

        foreach ($menus as $menu) {
            if (Auth::check()) {
                $user = Auth::user();
                $userRole = $user->roles()->getResults();
                $menuRole = $menu->roles()->getResults();
                for ($i = 0; $i < count($menuRole); $i++) {
                    for ($j = 0; $j < count($userRole); $j++) {
                        if ($menuRole[$i]->id === $userRole[$j]->id) {
                            $userMenu[] = $menu;
                        }
                    }
                }
            } else {
                $menuRole = $menu->roles()->getResults();
                for ($i = 0; $i < count($menuRole); $i++) {
                    if ($menuRole[$i]->name === "guest") {
                        $userMenu[] = $menu;
                    }
                }
            }
        }

        //$this->layout->menu = View::make("menu", array("menus",$userMenu));
        return $userMenu;
    }

    public function index() {
        $menus = Menu::all();
        return View::make("admin.menu.list", array("menus" => $menus));
    }

    public function show($id) {
        $menu = Menu::find($id);
        return View::make('admin.menu.show')->with('menu', $menu);
    }

    public function edit($id) {
        $menu = Menu::find($id);
        return View::make('admin.menu.edit')->with('menu', $menu);
    }

    public function store() {
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'title' => 'required',
            'route' => 'required',
            'roles' => 'required',
            'menu_image' => 'mimes:jpeg,bmp,png'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('menu/create')->withErrors($validator)->withInput();
        } else {
            // store
            if (Input::file('menu_image')->isValid()) {
                Input::file('menu_image')->move(MenuController::imagePath());
            }
            $menu = new Menu();
            $menu->name = Input::get('name');
            $menu->description = Input::get('description');
            $menu->image = MenuController::imagePath() . Input::file('menu_image')->getClientOriginalName();
            $menu->title = Input::get('title');
            $menu->route = Input::get('route');
            $menu->save();

            foreach (Input::get('roles') as $roleId) {
                $menu->roles()->attach($roleId);
            }
            // redirect
            Session::flash('message', 'Successfully created menu!');
            return Redirect::to('admin/menu');
        }
    }

    public function update($id) {
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'title' => 'required',
            'route' => 'required',
            'roles' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/menu/' . $id . '/edit')->withErrors($validator)->withInput();
        } else {
            // store
            $filename = "";
            if (Input::hasFile('menu_image')) {
                if (Input::file('menu_image')->isValid()) {
                    Input::file('menu_image')->move(MenuController::imagePath());
                    $filename = Input::file('menu_image')->getClientOriginalName();
                }
            }
            $menu = Menu::find($id);
            $menu->name = Input::get('name');
            $menu->description = Input::get('description');
            if ($filename !== "") {
                $menu->image = MenuController::imagePath() . $filename;
            }
            $menu->title = Input::get('title');
            $menu->route = Input::get('route');
            $menu->save();

            foreach (Role::all() as $role) {
                $menu->roles()->detach($role->id);
            }
            foreach (Input::get('roles') as $roleId) {
                $found = false;
                foreach ($menu->roles()->getResults() as $roleMenu) {
                    if ($roleMenu->id === $roleId) {
                        $found = true;
                    }
                }
                if (!$found) {
                    $menu->roles()->attach($roleId);
                }
            }
            // redirect
            Session::flash('message', 'Successfully updated menu!');
            return Redirect::to('admin/menu');
        }
    }

    public function create() {
        return View::make('admin.menu.create');
    }

    public function destroy($id) {
        $menu = Menu::find($id);
        return View::make('admin.menu.delete')->with('menu', $menu);
    }

    public function delete($id) {
        $menu = Menu::find($id);

        foreach ($menu->roles()->getResults() as $role) {
            $menu->roles()->detach($role->id);
        }

        $menu->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the menu!');
        return Redirect::to('admin/menu');
    }

    final public static function imagePath() {
        return '/home/elioth010/PHPWorkspace/carretilla_online/public/web/images/menu/';
    }

}
