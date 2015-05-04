@extends('layout')

@section('content')

<div class="single_center">
    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
    <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif

    @if (Session::has('message'))
    <ul class="tick tick1">
        <i class="icon4"> </i>
        <li class="icon4_desc"><p>{{ Session::get('message') }}</p></li>
    </ul>
    @endif
    <div id="create-container" class="container">
        <h1>Create a user</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'admin/user', 'method'=>'post')) }}
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password',array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('age', 'Age:') }}
            {{ Form::text('age', Input::old('age'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('role', 'Role:') }}
            <br>
            @foreach(Role::all() as $rol)
            {{Form::checkbox('roles[]', $rol->id, null , array("style", "padding-left:1.5em"))}}<label style="padding-right:0.5em" >{{$rol->name.''}}</label>
            @endforeach
        </div>

        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
        <a href="{{URL::to('admin/user')}}" class="btn btn-danger">Cancel</a>

        {{ Form::close() }}
    </div>
</div>
@stop