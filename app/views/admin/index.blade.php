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
        
        
        <div class="grid_5">
            @foreach($adminMenu as $menu)
            <a href="{{URL::to($menu->route)}}">
                <div class="col-md-4" style="margin-top: 20px; margin-bottom: 20px;">
                    <div class="span_9">
                        <div class="col_7">
                            <div class="img-circle">
                                <img src="{{$menu->image}}" id="image_menu_{{$menu->id}}">
                            </div>
                            <h3 class="m_4">{{$menu->title}}</h3>
                         </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        
    </div>
</section>
@stop