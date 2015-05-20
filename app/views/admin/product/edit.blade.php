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
        <h1>Edit {{$product->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($product, array('url'=>'admin/product/'.$product->code,'method' => 'post', 'files' => true)) }}
        {{ Form::token() }}
        
        <div class="form-group">
            {{ Form::label('code', 'Code:') }}
            {{ Form::text('code', $product->code, array('class' => 'form-control')) }}
        </div>
         
        <div class="form-group">
            {{ Form::label('mark', 'Mark:') }}
            {{ Form::select('mark', ['' => ''] + Mark::all()->lists('name', 'code'),$product->mark()->getResults()->code, array('class', 'form-controll', 'disabled'))}}
        </div>
        
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $product->name, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Price:') }}
            {{ Form::text('price', $product->price, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Image:') }}
            {{ Form::text('image_before',str_replace(ProductController::imagePath(), "" ,$product->image),array('disabled', 'class' => 'form-control', 'style'=>'width: 50%;')) }}
            {{ Form::file('product_image') }}
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category:') }}
            <br>
            <?php
            foreach (Category::all() as $category) {
                $find = false;
                foreach ($product->categories()->getResults() as $checkbox) {
                    if ($checkbox->id === $category->id) {
                        $find = true;
                        break;
                    }
                }
                if ($find) {
                    echo Form::checkbox('categories[]', $checkbox->id, true, array("style", "padding-left:1.5em"));
                    echo '<label style="padding-right:0.5em" >' . $checkbox->name . '</label>';
                } else {
                    echo Form::checkbox('categories[]', $category->id, null , array("style", "padding-left:1.5em"));
                    echo '<label style="padding-right:0.5em" >' . $category->name . '</label>';
                }
            }
            ?>
        </div>

        <a href="{{URL::to('admin/product')}}" class="btn btn-danger">Return</a>
        {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    </div>
</div>
@stop