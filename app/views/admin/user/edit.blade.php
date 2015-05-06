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
        <h1>Edit {{$user->name}}</h1>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($user, array('url'=>'admin/user/'.$user->id,'method' => 'post')) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', $user->username, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password',array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', $user->email, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $user->name, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('age', 'Age:') }}
            {{ Form::text('age', $user->age, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('role', 'Role:') }}
            <br>
            <?php
            foreach (Role::all() as $role) {
                $find = false;
                foreach ($user->roles()->getResults() as $checkbox) {
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
        {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
        <a href="{{URL::to('admin/user')}}" class="btn btn-danger">Return</a>
    </div>
</div>
@stop