<?php

/*
  |--------------------------------------------------------------------------
  | Application & Route Filters
  |--------------------------------------------------------------------------
  |
  | Below you will find the "before" and "after" events for the application
  | which may be used to do any work before or after a request into your
  | application. Here you may also register your custom route filters.
  |
 */

App::before(function($request) {
    //
});


App::after(function($request, $response) {
    //
});

/*
  |--------------------------------------------------------------------------
  | Authentication Filters
  |--------------------------------------------------------------------------
  |
  | The following filters are used to verify that the user of the current
  | session is logged into this application. The "basic" filter easily
  | integrates HTTP Basic authentication for quick, simple checking.
  |
 */

Route::filter('auth', function() {
    
    if (Auth::viaRemember()){
        return Redirect::guest('login');
    }else {
        if (Auth::guest()) {
           return Redirect::guest('login')->with('flash_error', 'You must be logged in to view this page!');
        }else{
            $admin = false;
            foreach(Auth::user()->roles()->getResults() as $role){
                if($role->name==='user' || $role->name==='guest'){
                    
                }else{
                    $admin=true;
                }
            }
            if($admin){
            
            }else{
                return Redirect::guest('home')->with('flash_error', 'You must be admin in to view this page!');
            }
        }   
    }
});

Route::filter('auth-shopp', function() {
    
    if (Auth::viaRemember()){
        return Redirect::route('product');
    }else {
        if (Auth::guest()) {
           return Redirect::guest('login')->with('flash_error', 'You must be logged in to view this page!');
        }   
    }
});




Route::filter('auth.basic', function() {
    return Auth::basic();
});

/*
  |--------------------------------------------------------------------------
  | Guest Filter
  |--------------------------------------------------------------------------
  |
  | The "guest" filter is the counterpart of the authentication filters as
  | it simply checks that the current user is not logged in. A redirect
  | response will be issued if they are, which you may freely change.
  |
 */

Route::filter('guest', function() {
    if (Auth::check()) {
        return Redirect::route('home')->with('flash_notice', 'You are already logged in!');
    }
});

Route::get('login', array('as' => 'login', function () {
    return View::make('login');
}))->before('guest');

Route::get('logout', array('as' => 'logout', function () {
        
}))->before('auth');

Route::get('profile', array('as' => 'profile', function () {
    return View::make('profile');
}))->before('auth');
/*
  |--------------------------------------------------------------------------
  | CSRF Protection Filter
  |--------------------------------------------------------------------------
  |
  | The CSRF filter is responsible for protecting your application against
  | cross-site request forgery attacks. If this special token in a user
  | session does not match the one given in this request, we'll bail.
  |
 */

Route::filter('csrf', function() {
    if (Session::token() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
