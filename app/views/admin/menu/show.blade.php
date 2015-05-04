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
        <h1>Show {{$menu->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'admin/menu', 'method'=>'post', 'files' => true)) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $menu->name, array('class' => 'form-control', 'disabled')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description', $menu->description, array('class' => 'form-control', 'disabled')) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Image:') }}
            {{ Form::text('menu_image',str_replace(MenuController::imagePath(), "" ,$menu->image),array('disabled', 'class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', $menu->title, array('class' => 'form-control','disabled')) }}
        </div>

        <div class="form-group">
            {{ Form::label('role', 'Role:') }}
            <br>
            @foreach($menu->roles()->getResults() as $checkbox)
            {{Form::checkbox($checkbox->name, $checkbox->id, true , array("style", "padding-left:1.5em", 'disabled'))}}<label style="padding-right:0.5em" >{{$checkbox->name.''}}</label>
            @endforeach
            <!--            Form::select('role', ['' => ''] +$menu->roles()->getResults()->lists('name', 'id')) -->
        </div>

        <div class="form-group">
            {{ Form::label('route', 'Route:') }}
            {{ Form::text('route', $menu->route, array('class' => 'form-control','disabled')) }}
        </div>
        <a href="{{ URL::to('admin/menu') }}" class="btn btn-danger">Return</a>
    </div>
</div>
@stop