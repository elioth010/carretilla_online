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
        <h1>Edit {{$mark->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($mark, array('url'=>'admin/mark/'.$mark->id,'method' => 'post', 'files' => true)) }}
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('code', 'Code:') }}
            {{ Form::text('code', $mark->description, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $mark->name, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description', $mark->description, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('range_initial', 'Intial Product:') }}
            {{ Form::text('range_initial', $mark->description, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('range_final', 'Final Product:') }}
            {{ Form::text('range_final', $mark->title, array('class' => 'form-control')) }}
        </div>

        <a href="{{URL::to('admin/mark')}}" class="btn btn-danger">Return</a>
        {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    </div>
</div>
@stop