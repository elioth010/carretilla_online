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
    
    public function showAllMenus(){
        $menus = Menu::all();
        return View::make("admin.menu.list", array("menus"=>$menus));
    }
}
