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
        <h1>Create a menu entry</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'admin/menu', 'method'=>'post', 'files' => true)) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Image:') }}
            {{ Form::file('menu_image') }}
        </div>

        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('role', 'Role:') }}
            <br>
            @foreach(Role::all() as $rol)
            {{Form::checkbox('roles[]', $rol->id, null , array("style", "padding-left:1.5em"))}}<label style="padding-right:0.5em" >{{$rol->name.''}}</label>
            @endforeach
            <!--           Form::select('role', ['' => ''] +Role::lists('name', 'id'), array('multiple'=>'multiple', 'class'=> 'dropdown'))-->
        </div>

        <div class="form-group">
            {{ Form::label('route', 'Route:') }}
            {{ Form::text('route', Input::old('route'), array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('order', 'Order:') }}
            {{ Form::text('order', Input::old('order'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
        <a href="{{URL::to('admin/menu')}}" class="btn btn-danger">Cancel</a>

        {{ Form::close() }}
    </div>
</div>
@stop