@extends('layout')

@section('content')
<h1>User Profile</h1>

<!-- check for login error flash var -->
@if (Session::has('flash_error'))
<div id="flash_error">{{ Session::get('flash_error') }}</div>
@endif
<div class="single_center">
    <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{Auth::user()->name}}</dd>
        <dt>Email</dt>
        <dd>{{Auth::user()->email}}</dd>
        <dt>Age</dt>
        <dd>{{Auth::user()-> age}} Years old</dd>
    </dl>
</div>
@stop