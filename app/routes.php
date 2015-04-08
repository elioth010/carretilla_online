<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('route', function()
{
	return View::make('hello');
});

Route::get('/', "HomeController@showWelcome");
Route::get('/users', "UserController@showUser");
Route::get('/users/add', "UserController@addUser");
Route::get('/users/update', "UserController@updateUser");
Route::get('/users/delete', "UserController@deleteUser");

//<<<<<<< HEAD
Route::get('/', array('as' => 'home', function () { 
    return View::make("home");
}));

Route::get('login', array('as' => 'login', function () {
    
}));

Route::get('login', array('as' => 'login', function () {
    return View::make('login');
}))->before('guest');

Route::post('login', function () {
    $user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );
    
    if (Auth::attempt($user)) {
        return View::route('home')->with('flash_notice', 'You are successfully logged in.');
    }
    // authentication failure! lets go back to the login page
    return Redirect::route('login')->with('flash_error', 'Your username/password combination was incorrect.')->withInput();
});

Route::get('logout', array('as' => 'logout', function () { }));

Route::get('profile', array('as' => 'profile', function () { }));

Route::filter('guest', function(){
    if (Auth::check()){
        return Redirect::route('home')->with('flash_notice', 'You are already logged in!');
    }
});

Route::get('logout', array('as' => 'logout', function () { }))->before('auth');

Route::get('profile', array('as' => 'profile', function () { }))->before('auth');

Route::filter('auth', function(){
        if (Auth::guest()){
            return Redirect::route('login')->with('flash_error', 'You must be logged in to view this page!');
        }
});

Route::get('/roles', "RoleController@showRole");
Route::get('/roles/add', "RoleController@addRole");
Route::get('/roles/update', "RoleController@updateRole");
Route::get('/roles/delete', "RoleController@deleteRole");

//PRODUCT
Route::get('/products', "ProductController@showProduct");
Route::get('/products/add', "UserController@addProduct");
Route::get('/products/update', "ProductController@updateProduct");
Route::get('/products/delete', "ProductController@deleteProduct");
