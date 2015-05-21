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
        <h1>Show {{$menu->name}}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'admin/menu', 'method'=>'post', 'files' => true)) }}
        {{ Form::token() }}
        <table id="datatable-order" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->date}}</td>
                </tr>
            </tbody>
        </table>
        
        <table id="datatable-order" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Quantity</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->detail()->getResults() as $detail)
                <tr>
                    <td>{{$detail->product_id}}-{{$detail->product->name}}</td>
                    <td>{{$detail->quantity}}</td>
                    <td>Q{{money_format('%.2n',$detail->sub_total)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" style="text-align: right; padding-right: 65px;">Total: Q{{money_format('%.2n',$order->total)}}</td>
                    
                </tr>
            </tbody>
        </table>

        <a href="{{ URL::to('orders') }}" class="btn btn-danger">Return</a>
    </div>
</div>
@stop