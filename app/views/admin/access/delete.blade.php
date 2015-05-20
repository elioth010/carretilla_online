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
        <h1>Delete Acces To {{$adminMenu->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'admin/access/'.$adminMenu->id.'/delete/'.$role->id)) }}
         {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('role', 'Role:') }}
            {{ Form::text('role', $role->name, array('class' => 'form-control', 'disabled')) }}
        </div>

        <div class="form-group">
            {{ Form::label('action', 'Action:') }}
            <br>
            <?php
            foreach (Action::all() as $action) {
                $find = false;
                foreach ($role->actions()->getResults() as $checkboxAction) {
                    if ($checkboxAction->id === $action->id) {
                        $find = true;
                        break;
                    }
                }
                if ($find) {
                    echo Form::checkbox('actions[]', $checkboxAction->id, true, array("style", "padding-left:1.5em", 'disabled'));
                    echo '<label style="padding-right:0.5em" >' . $checkboxAction->name . '</label>';
                } else {
                    echo Form::checkbox('actions[]', $action->id, false, array("style", "padding-left:1.5em", 'disabled'));
                    echo '<label style="padding-right:0.5em" >' . $action->name . '</label>';
                }
            }
            ?>
            <!--            Form::select('role', ['' => ''] +$accessMenu->roles()->getResults()->lists('name', 'id')) -->
        </div>
        
        <a href="{{URL::to('admin/access/'.$adminMenu->id)}}" class="btn btn-info">Return</a>
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{Form::close()}}
    </div>
</div>
@stop