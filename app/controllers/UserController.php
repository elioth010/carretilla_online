<?php

class UserController extends BaseController {

	//protected $layout 

	public function index(){
		$data = User::all();
		return View::make('user', array('data' => $data));
	}

	public function showUser(){

		$users = User::all();
		// Con el método all() le estamos pidiendo al modelo de Usuario
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array

        return View::make('users', array('users' => $users));

        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los usuarios
	}
	
	public function showProfile($id){
		$id = Auth::user();
		$users = User::find($id);
		return View::make('profile', array('users' => $users));
		//
	}
}
