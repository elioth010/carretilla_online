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
        <h1>Edit {{$role->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($role, array('url'=>'admin/role/'.$role->id,'method' => 'post')) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $role->name, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description', $role->description, array('class' => 'form-control')) }}
        </div>
        
        <a href="{{URL::to('admin/role')}}" class="btn btn-danger">Return</a>
        {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    </div>
</div>
@stop