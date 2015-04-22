<!--    <li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
<!--@if(Auth::check())
    
    <li><a href="{{ URL::route('profile') }}">Profile</a></li>
    <li><a href="{{ URL::route('logout') }}">Logout ('{{Auth::user()->username}}')</a></li>
    @else
    <li><a href="{{ URL::route('login') }}">Login</a></li>
@endif
-->
<!--<label value="<?php var_dump($menus) ?>"/>-->
<ul class="nav navbar-nav">
    @foreach($menus as $menu)
    <li title="{{$menu->title}}"><a href="{{ URL::route($menu->route) }}">{{$menu->title}}</a></li>
    @endforeach 
</ul>
