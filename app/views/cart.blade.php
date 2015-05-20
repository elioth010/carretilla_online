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
                        <td>Actions</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($cart as $row)}}
                    <tr>
                        <td>
                            <p><strong>{{$row->name}}></strong></p>
                            <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                        </td>
                        <td>{{$row->qty;}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->subtotal}}></td>
                        <td>
                            {{ Form::open(array('url' => 'order', 'method'=>'put', 'files' => true)) }}
                            <input type="hidden" value="{{$row->id}}" name="product" id="product" />
                            {{ Form::submit('Remove', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@stop