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

Route::any('route', function() {
    return View::make('hello');
});

Route::get('/', array('as' => 'home', function () {
        return View::make("home");
    }));

Route::get('home', array('as' => 'home', function () {
        return Redirect::to('/');
    }));

Route::post('login', function(){
    $user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );

    if (Auth::attempt($user, (Input::has('remember_me')) ? true : false)) {
        Session::put('user', $user['username']);
        return Redirect::route('home')->with('flash_notice', 'You are successfully logged in.');
    }
    
    // authentication failure! lets go back to the login page
    return Redirect::route('login')->with('flash_error', 'Your username/password combination was incorrect.')->withInput();
})->before('csrf');

Route::controller('password', 'RemindersController');

Route::get('logout', array('as' => 'logout', function () {
        Auth::logout();
        return Redirect::route('home')->with('flash_notice', 'You are successfully logged out.');
    }))->before('auth');
    
Route::get('logout', array('as' => 'logout', function () {
        Auth::logout();
        return Redirect::route('home')->with('flash_notice', 'You are successfully logged out.');
    }))->before('auth-shopp');

//Menu Routes
Route::get('profile', "UserController@showProfile")->before('auth');
Route::get('profile', "UserController@showProfile")->before('auth-shopp');
Route::get('product', "ProductController@listProducts");
//ORDER
Route::post('order', "OrderController@store")->before('auth-shopp')->before('csrf');
Route::get('orders', "OrderController@getMyOrders")->before('auth-shopp');
Route::get('order/{id}', "OrderController@myOrderShow")->before('auth-shopp');
Route::get('order/{id}/delete', "OrderController@myOrderDestroy")->before('auth-shopp');
Route::delete('order/{id}', "OrderController@delete")->before('auth-shopp')->before('csrf');

//Carretilla
Route::put('order', "OrderController@addToCart")->before('auth-shopp');
Route::delete('order', "OrderController@removeToCart")->before('auth-shopp');
Route::get('shooppingcart', "OrderController@viewCart")->before('auth-shopp');


//Admin Routes
Route::get('admin', "AdminController@index")->before('auth');

//Menu
Route::get('admin/menu', "MenuController@index")->before('auth');
Route::get('admin/menu/create', "MenuController@create")->before('auth');
Route::post('admin/menu', "MenuController@store")->before('auth')->before('csrf');
Route::get('admin/menu/{id}', "MenuController@show")->before('auth');
Route::get('admin/menu/{id}/edit', "MenuController@edit")->before('auth');
Route::get('admin/menu/{id}/delete', "MenuController@destroy")->before('auth');
Route::post('admin/menu/{id}', "MenuController@update")->before('auth')->before('csrf');
Route::delete('admin/menu/{id}', "MenuController@delete")->before('auth')->before('csrf');

Route::get('admin/role', "RoleController@index")->before('auth');
Route::get('admin/role/create', "RoleController@create")->before('auth');
Route::post('admin/role', "RoleController@store")->before('auth')->before('csrf');
Route::get('admin/role/{id}', "RoleController@show")->before('auth');
Route::get('admin/role/{id}/edit', "RoleController@edit")->before('auth');
Route::get('admin/role/{id}/delete', "RoleController@destroy")->before('auth');
Route::post('admin/role/{id}', "RoleController@update")->before('auth')->before('csrf');
Route::delete('admin/role/{id}', "RoleController@delete")->before('auth')->before('csrf');

//product
Route::get('admin/product', "ProductController@index")->before('auth');
Route::get('admin/product/create', "ProductController@create")->before('auth');
Route::post('admin/product', "ProductController@store")->before('auth')->before('csrf');
Route::get('admin/product/{id}', "ProductController@show")->before('auth');
Route::get('admin/product/{id}/edit', "ProductController@edit")->before('auth');
Route::get('admin/product/{id}/delete', "ProductController@destroy")->before('auth');
Route::post('admin/product/{id}', "ProductController@update")->before('auth')->before('csrf');
Route::delete('admin/product/{id}', "ProductController@delete")->before('auth')->before('csrf');

//Users
Route::get('admin/user', "UserController@index")->before('auth');
Route::get('admin/user/create', "UserController@create")->before('auth');
Route::post('admin/user', "UserController@store")->before('auth')->before('csrf');
Route::get('admin/user/{id}', "UserController@show")->before('auth');
Route::get('admin/user/{id}/edit', "UserController@edit")->before('auth');
Route::get('admin/user/{id}/delete', "UserController@destroy")->before('auth');
Route::post('admin/user/{id}', "UserController@update")->before('auth')->before('csrf');
Route::delete('admin/user/{id}', "UserController@delete")->before('auth')->before('csrf');

//Categories
Route::get('admin/category', "CategoryController@index")->before('auth');
Route::get('admin/category/create', "CategoryController@create")->before('auth');
Route::post('admin/category', "CategoryController@store")->before('auth')->before('csrf');
Route::get('admin/category/{id}', "CategoryController@show")->before('auth');
Route::get('admin/category/{id}/edit', "CategoryController@edit")->before('auth');
Route::get('admin/category/{id}/delete', "CategoryController@destroy")->before('auth');
Route::post('admin/category/{id}', "CategoryController@update")->before('auth')->before('csrf');
Route::delete('admin/category/{id}', "CategoryController@delete")->before('auth')->before('csrf');

//Actiones Roles
Route::get('admin/admin_menu', "AdminController@getList")->before('auth');
Route::post('admin/admin_menu', "AdminController@store")->before('auth')->before('csrf');
Route::get('admin/admin_menu/{id}', "AdminController@show")->before('auth');
Route::get('admin/admin_menu/{id}/edit', "AdminController@edit")->before('auth');
Route::post('admin/admin_menu/{id}', "AdminController@update")->before('auth')->before('csrf');

//Access Roles Menus
Route::get('admin/access/{idMenu}', "AccessController@index")->before('auth');
Route::get('admin/access/{idMenu}/create', "AccessController@create")->before('auth');
Route::post('admin/access/{idMenu}', "AccessController@store")->before('auth')->before('csrf');
Route::get('admin/access/{idMenu}/view/{id}', "AccessController@show")->before('auth');
Route::get('admin/access/{idMenu}/edit/{id}', "AccessController@edit")->before('auth');
Route::post('admin/access/{idMenu}/update/{id}', "AccessController@update")->before('auth')->before('csrf');
Route::get('admin/access/{idMenu}/delete/{id}', "AccessController@delete")->before('auth');
Route::delete('admin/access/{idMenu}/delete/{id}', "AccessController@destroy")->before('auth')->before('csrf');

//Marks
Route::get('admin/mark', "MarkController@index")->before('auth');
Route::get('admin/mark/create', "MarkController@create")->before('auth');
Route::post('admin/mark', "MarkController@store")->before('auth')->before('csrf');
Route::get('admin/mark/{id}', "MarkController@show")->before('auth');
Route::get('admin/mark/{id}/edit', "MarkController@edit")->before('auth');
Route::get('admin/mark/{id}/delete', "MarkController@destroy")->before('auth');
Route::post('admin/mark/{id}', "MarkController@update")->before('auth')->before('csrf');
Route::delete('admin/mark/{id}', "MarkController@delete")->before('auth')->before('csrf');

//Products

Route::get('admin/product', "ProductController@index")->before('auth');
Route::get('admin/product/create', "ProductController@create")->before('auth');
Route::post('admin/product', "ProductController@store")->before('auth')->before('csrf');
Route::get('admin/product/{id}', "ProductController@show")->before('auth');
Route::get('admin/product/{id}/edit', "ProductController@edit")->before('auth');
Route::get('admin/product/{id}/delete', "ProductController@destroy")->before('auth');
Route::post('admin/product/{id}', "ProductController@update")->before('auth')->before('csrf');
Route::delete('admin/product/{id}', "ProductController@delete")->before('auth')->before('csrf');

Route::get('admin/order', "OrderController@index")->before('auth');
Route::get('admin/order/{id}', "OrderController@show")->before('auth');
Route::get('admin/order/{id}/delete', "OrderController@destroy")->before('auth');
Route::delete('admin/order/{id}', "OrderController@delete")->before('auth')->before('csrf');

Route::get('admin/order', "OrderController@index")->before('auth');
Route::get('admin/order/{id}', "OrderController@show")->before('auth');
Route::get('admin/order/{id}/delete', "OrderController@destroy")->before('auth');
Route::delete('admin/order/{id}', "OrderController@delete")->before('auth')->before('csrf');