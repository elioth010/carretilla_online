@extends('layout')

@section('content')
<h1>Login</h1>

<!-- check for login error flash var -->
@if (Session::has('flash_error'))
<div id="flash_error">{{ Session::get('flash_error') }}</div>
@endif

<section class="container">
    <div class="login">
        <h1>Login to Web App</h1>
        <form method="post" action="login">
            <p><input type="text" name="username" value="" placeholder="Username or Email"></p>
            <p><input type="password" name="password" value="" placeholder="Password"></p>
            <p class="remember_me">
                <label>
                    <input type="checkbox" name="remember_me" id="remember_me">
                    Remember me on this computer
                </label>
            </p>
            <p class="submit"><input type="submit" name="commit" value="Login"></p>
        </form>
    </div>

    <div class="login-help">
        <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    </div>
</section>
@stop