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
        
        <br/>
        <br/>
        <div class="grid_1" style="background: #ffffff; padding: 2px;">    
            <table id="datatable-menu" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Roles</th>
                        <th>Route</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminMenus as $adminMenu)
                    <tr>
                        <td>{{$adminMenu->name}}</td>
                        <td>{{$adminMenu->description}}</td>
                        <td>
                         <?php
                            $count = 0;
                            foreach ($adminMenu->roles()->groupBy("id")->get() as $role) {
                                if($count < (count($adminMenu->roles()->groupBy("id")->get())-1)){
                                    echo $role->name.', ';
                                }else{
                                    echo $role->name;
                                }
                                $count++;
                            }
                            ?>
                        </td>
                        <td>{{$adminMenu->route}}</td>
                        <td> 
                            <a href="{{URL::to('admin/admin_menu/'.$adminMenu->id)}}" class="btn btn-info">View</a>
                            <a href="{{URL::to('admin/admin_menu/'.$adminMenu->id.'/edit')}}" class="btn btn-default">Edit</a>
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