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
        <h1>Create a Administration Menu entry</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'admin/access/'.$idMenu, 'method'=>'post')) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('role', 'Role:') }}
            {{ Form::select('role', ['' => ''] + Role::all()->lists('name', 'id')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('action', 'Action:') }}
            @foreach(Action::all() as $action)
                {{Form::checkbox('actions[]', $action->id, null , array("style", "padding-left:1.5em"))}}<label style="padding-right:0.5em" >{{$action->name.''}}</label>
            @endforeach
        </div>

        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
        <a href="{{URL::to('admin/admin_menu'.$idMenu)}}" class="btn btn-danger">Cancel</a>

        {{ Form::close() }}
    </div>
</div>
@stop