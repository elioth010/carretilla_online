@extends('layout')

@section('content')
<h1>Login</h1>

<!-- check for login error flash var -->
@if (Session::has('flash_error'))
<div class="tooltip_box1" id="flash_error">{{ Session::get('flash_error') }}</div>
@endif

<script>
    jQuery(document).ready(function ($) {
        $(window).resize(function () {
            $("#login-form").css({
                'margin-top': ($("#menu-container").children().height() + 50)
            });
        });
        $(window).resize();

    });
</script>

<section class="login">
    <div class="login-form">
        <form method="post" action="login">
            <h1>Enter your credentials</h1>
            <input type="text" name="username" value="" placeholder="Username or Email">
            <input type="password" name="password" value="" placeholder="Password">
            <p class="remember_me">
                <label>
                    <input type="checkbox" name="remember_me" id="remember_me">
                    Remember me on this computer
                </label>
            </p>
            <input value="Login" type="submit">

            <div class="login-help">
                <p>Forgot your password? <a href="index.php">Click here to reset it</a>.</p>
            </div>
        </form>
    </div>
</section>
@stop