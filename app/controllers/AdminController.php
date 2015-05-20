<?php

class AdminController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $adminMenu = AdministrationMenu::orderBy('name')->get();
        return View::make("admin.index", array("adminMenu" => $adminMenu));
    }

    public function getList() {
        $adminMenus = AdministrationMenu::orderBy('name')->get();
        return View::make("admin.admin_menu.list", array("adminMenus" => $adminMenus));
    }

    public function show($id) {
        $adminMenu = AdministrationMenu::find($id);
        return View::make('admin.admin_menu.show')->with('adminMenu', $adminMenu);
    }

    public function edit($id) {
        $adminMenu = AdministrationMenu::find($id);
        return View::make('admin.admin_menu.edit')->with('adminMenu', $adminMenu);
    }

    public function update($id) {
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'title' => 'required',
            'route' => 'required',
            'menu_image' => 'mimes:jpeg,bmp,png'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/admin_menu/' . $id . '/edit')->withErrors($validator)->withInput();
        } else {
            // store
            $filename = "";
            if (Input::hasFile('menu_image')) {
                if (Input::file('menu_image')->isValid()) {
                    Input::file('menu_image')->move(AdminController::imagePath());
                    $filename = Input::file('menu_image')->getClientOriginalName();
                }
            }
            $adminMenu = new AdministrationMenu();
            $adminMenu->name = Input::get('name');
            $adminMenu->description = Input::get('description');
            if ($filename !== "") {
                $adminMenu->image = AdminController::imagePath() . $filename;
            }
            $adminMenu->title = Input::get('title');
            $adminMenu->route = Input::get('route');
            $adminMenu->save();

            // redirect
            Session::flash('message', 'Successfully updated admin_menu!');
            return Redirect::to('admin/admin_menu');
        }
    }

    final public static function imagePath() {
        return '/home/elioth010/PHPWorkspace/carretilla_online/public/web/images/admin_menu/';
    }

}
