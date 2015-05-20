@extends('layout')

@section('content')
<section>
    <div id=principal class="container" >
        @if (Session::has('flash_error'))
        <div class="tooltip_box1" id="flash_error">{{ Session::get('flash_error') }}</div>
        @endif

        @if (Session::has('message'))
        <ul class="tick tick1">
            <i class="icon4"> </i>
            <li class="icon4_desc"><p>{{ Session::get('message') }}</p></li>
        </ul>
        @endif

        <a href="{{action("CategoryController@create")}}" class="btn btn-success">Add</a>
        <br/>
        <br/>
        <div class="grid_1" style="background: #ffffff; padding: 2px;">    
            <table id="datatable-category" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td> 
                            <a href="{{URL::to('admin/category/'.$category->id)}}" class="btn btn-info">View</a>
                            <a href="{{URL::to('admin/category/'.$category->id.'/edit')}}" class="btn btn-default">Edit</a>
                            <a href="{{URL::to('admin/category/'.$category->id.'/delete')}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@stop
<!--action('UserController@updateUser', $usuario->id)-->
<!--action('UserController@deleteUser', $usuario->id)-->