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
        
        <a href="{{URL::to('admin/access/'.$idMenu.'/create')}}" class="btn btn-success">Add</a>
        <br/>
        <br/>
        <div class="grid_1" style="background: #ffffff; padding: 2px;">    
            <table id="datatable-menu" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>Access</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>
                         <?php
                            $count = 0;
                            foreach ($role->actions()->groupBy('id')->get() as $action) {
                                if($count < (count($role->actions()->get())-1)){
                                    echo $action->name.', ';
                                }else{
                                    echo $action->name;
                                }
                                $count++;
                            }
                            ?>
                        </td>
                        <td> 
                            <a href="{{URL::to('admin/access/'.$idMenu.'/view/'.$role->id)}}" class="btn btn-info">View</a>
                            <a href="{{URL::to('admin/access/'.$idMenu.'/edit/'.$role->id)}}" class="btn btn-default">Edit</a>
                            <a href="{{URL::to('admin/access/'.$idMenu.'/delete/'.$role->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br/>
        <br/>
        <a href="{{URL::to('admin/admin_menu/'.$idMenu)}}" class="btn btn-danger">Return</a>
        
    </div>
</section>
@stop
<!--action('UserController@updateUser', $usuario->id)-->
<!--action('UserController@deleteUser', $usuario->id)-->