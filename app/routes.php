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

//USER
Route::get('/', "HomeController@showWelcome");
Route::get('/users', "UserController@showUser");
Route::get('/users/add', "UserController@addUser");
Route::get('/users/update', "UserController@updateUser");
Route::get('/users/delete', "UserController@deleteUser");

//ROLE
Route::get('/roles', "RoleController@showRole");
Route::get('/roles/add', "RoleController@addRole");
Route::get('/roles/update', "RoleController@updateRole");
Route::get('/roles/delete', "RoleController@deleteRole");

//PRODUCT
Route::get('/products', "ProductController@showProduct");
Route::get('/products/add', "UserController@addProduct");
Route::get('/products/update', "ProductController@updateProduct");
Route::get('/products/delete', "ProductController@deleteProduct");