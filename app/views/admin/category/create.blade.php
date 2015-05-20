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

        {{ Form::open(array('url' => 'admin/category', 'method'=>'post')) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
        <a href="{{URL::to('admin/category')}}" class="btn btn-danger">Cancel</a>

        {{ Form::close() }}
    </div>
</div>
@stop