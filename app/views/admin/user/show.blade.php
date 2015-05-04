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
        <h1>Show {{$user->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'admin/user', 'method'=>'post')) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', $user->username, array('class' => 'form-control', 'disabled')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', $user->email, array('class' => 'form-control', 'disabled')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $user->name, array('class' => 'form-control', 'disabled')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('age', 'Age:') }}
            {{ Form::text('age', $user->age, array('class' => 'form-control', 'disabled')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('role', 'Role:') }}
            <br>
            @foreach($user->roles()->getResults() as $checkbox)
            {{Form::checkbox($checkbox->name, $checkbox->id, true , array("style", "padding-left:1.5em", 'disabled'))}}<label style="padding-right:0.5em" >{{$checkbox->name.''}}</label>
            @endforeach
        </div>
        <a href="{{ URL::to('admin/user') }}" class="btn btn-danger">Return</a>
    </div>
</div>
@stop