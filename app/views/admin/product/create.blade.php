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
        <h1>Create a product entry</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'admin/product', 'method'=>'post', 'files' => true)) }}
        {{ Form::token() }}
        <div class="form-group">
            {{ Form::label('code', 'Code:') }}
            {{ Form::text('code', Input::old('code'), array('class' => 'form-control', 'maxlength' => 8)) }}
        </div>

        <div class="form-group">
            {{ Form::label('mark', 'Mark:') }}
            {{ Form::select('mark', ['' => ''] + Mark::all()->lists('name', 'code')) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Price:') }}
            {{ Form::text('price', Input::old('description'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Image:') }}
            {{ Form::file('product_image') }}
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category:') }}
            <br>
            @foreach(Category::all() as $category)
            {{Form::checkbox('categories[]', $category->id, null , array("style", "padding-left:1.5em"))}}<label style="padding-right:0.5em" >{{$category->name.''}}</label>
            @endforeach
        </div>

        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
        <a href="{{URL::to('admin/product')}}" class="btn btn-danger">Cancel</a>

        {{ Form::close() }}
    </div>
</div>
@stop