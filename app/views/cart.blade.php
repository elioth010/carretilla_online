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
            <table id="datatable-product" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Item Price</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($cart as $row)
                    <tr>
                        <td>
                            <strong>{{$row->name}}</strong>
                        </td>
                        <td>{{$row->qty}}</td>
                        <td>Q{{money_format('%.2n', $row->price)}}</td>
                        <td>Q{{money_format('%.2n',$row->subtotal)}}</td>
                        <td>
                            {{ Form::open(array('url' => 'order')) }}
                            <input type="hidden" value="{{$row->id}}" name="product" id="product" />
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Remove', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" style="text-align: right; padding-right: 65px;">You Total: Q{{money_format('%.2n',Cart::total())}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br/>
        <br/>
        
        {{ Form::open(array('url' => 'order', 'method'=>'post', 'files' => true)) }}
        {{ Form::token() }}
        {{ Form::submit('Confirm Order', array('class' => 'btn btn-success')) }}
        {{ Form::close() }}
    </div>
</section>
@stop