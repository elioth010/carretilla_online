@extends('layout')

@section('content')
@if (Session::has('flash_error'))
<div class="tooltip_box1" id="flash_error">{{ Session::get('flash_error') }}</div>
@endif
<section>
    <div id=principal class="container" >
        <a href="#" class="btn btn-success">Add</a>
        <br/>
        <br/>
        <div class="grid_1" style="background: #ffffff; padding: 2px;">    
            <table id="datatable-menu" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Route</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->description}}</td>
                        <td>{{$menu->image}}</td>
                        <td>{{$menu->title}}</td>
                        <td>{{$menu->route}}</td>
                        <td> 
                            <a href="#" class="btn btn-info">View</a>
                            <a href="#" class="btn btn-default">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
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