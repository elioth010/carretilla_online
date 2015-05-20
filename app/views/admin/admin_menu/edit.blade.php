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
    
    <div id="create-container" class="container" style="padding-top: 5em;">
        <h1>Edit {{$adminMenu->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($adminMenu, array('url'=>'admin/admin_menu/'.$adminMenu->id,'method' => 'post')) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $adminMenu->name, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description', $adminMenu->description, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Image:') }}
            {{ Form::text('image_before',str_replace(AdminController::imagePath(), "" ,$adminMenu->image),array('disabled', 'class' => 'form-control', 'style'=>'width: 20%;')) }}
            {{ Form::file('menu_image') }}
        </div>

        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', $adminMenu->title, array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('route', 'Route:') }}
            {{ Form::text('route', $adminMenu->route, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('permissions', 'Administrar Roles y Permisos')}}
            <a href="{{ URL::to('admin/access/'.$adminMenu->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-search"></i></a>
            <!--            Form::select('role', ['' => ''] +$adminMenu->roles()->getResults()->lists('name', 'id')) -->
        </div>
        
        <a href="{{URL::to('admin/admin_menu')}}" class="btn btn-danger">Return</a>
        {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    </div>
</div>
@stop