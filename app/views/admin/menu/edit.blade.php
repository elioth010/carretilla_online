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
        <h1>Show {{$menu->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($menu, array('url'=>'admin/menu/'.$menu->id,'method' => 'post', 'files' => true)) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $menu->name, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description', $menu->description, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Image:') }}
            {{ Form::text('image_before',str_replace(MenuController::imagePath(), "" ,$menu->image),array('disabled', 'class' => 'form-control', 'style'=>'width: 20%;')) }}
            {{ Form::file('menu_image') }}
        </div>

        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', $menu->title, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('role', 'Role:') }}
            <br>
            <?php
            foreach (Role::all() as $role) {
                $find = false;
                foreach ($menu->roles()->getResults() as $checkbox) {
                    if ($checkbox->id === $role->id) {
                        $find = true;
                        break;
                    }
                }
                if ($find) {
                    echo Form::checkbox('roles[]', $checkbox->id, true, array("style", "padding-left:1.5em"));
                    echo '<label style="padding-right:0.5em" >' . $checkbox->name . '</label>';
                } else {
                    echo Form::checkbox('roles[]', $role->id, false, array("style", "padding-left:1.5em"));
                    echo '<label style="padding-right:0.5em" >' . $role->name . '</label>';
                }
            }
            ?>
            <!--            Form::select('role', ['' => ''] +$menu->roles()->getResults()->lists('name', 'id')) -->
        </div>

        <div class="form-group">
            {{ Form::label('route', 'Route:') }}
            {{ Form::text('route', $menu->route, array('class' => 'form-control')) }}
        </div>
        <a href="{{URL::to('admin/menu')}}" class="btn btn-danger">Return</a>
        {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    </div>
</div>
@stop