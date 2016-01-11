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
        <h1>Enter your credentials</h1>
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'login', 'method'=>'post')) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder'=>'Username')) }}
        </div>

        <div class="form-group">
            {{ Form::password('password',array('class' => 'form-control', 'placeholder'=>'Passoword')) }}
        </div>
        <div class="form-group">
            <p class="remember_me">
                <label>
                    {{ Form::checkbox('remember_me', 'value', false)}}
                    Remember me on this computer
                </label>
            </p>
            {{ Form::submit('Login', array('class' => 'btn btn-success')) }}
        </div>
        <div class="login-help">
            <p>Forgot your password? <a href="index.php">Click here to reset it</a>.</p>
        </div>
        {{ Form::close() }}
    </div>
</section>
@stop