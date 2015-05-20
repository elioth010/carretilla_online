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

        <a href="{{action("ProductController@create")}}" class="btn btn-success">Add</a>
        <br/>
        <br/>
        <div class="grid_1" style="background: #ffffff; padding: 2px;">    
            <table id="datatable-product" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Mark</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Categories</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->code}}</td>
                        <td>{{$product->mark()->getResults()->name}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{str_replace(ProductController::imagePath(), "" ,$product->image)}}</td>
                        <td>
                            <?php
                            $count = 0;
                            foreach ($product->categories()->getResults() as $category) {
                                if($count < (count($product->categories()->get())-1)){
                                    echo $category->name.', ';
                                }else{
                                    echo $category->name;
                                }
                                $count++;
                            }
                            ?>
                        </td>
                        <td> 
                            <a href="{{URL::to('admin/product/'.$product->code)}}" class="btn btn-info">View</a>
                            <a href="{{URL::to('admin/product/'.$product->code.'/edit')}}" class="btn btn-default">Edit</a>
                            <a href="{{URL::to('admin/product/'.$product->code.'/delete')}}" class="btn btn-danger">Delete</a>
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