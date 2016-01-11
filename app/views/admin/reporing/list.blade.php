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

        <div class="grid_1" style="background: #ffffff; padding: 2px;">    
            <table id="datatable-product" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Orders</td>
                        <td>See the orders created</td>
                        <a href="{{URL::to('admin/report/'.$product->code)}}" class="btn btn-info">View</a>
                    </tr>
                </tbody>
            </table>
        </div>
</section>
@stop