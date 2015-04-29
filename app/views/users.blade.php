@extends('layout')
@section('content')
<!-- check for login error flash var -->
@if (Session::has('flash_error'))
<div class="tooltip_box1" id="flash_error">{{ Session::get('flash_error') }}</div>
@endif

<section>
<div id=principal class="container">
	<div class="grid_1">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No.</th>
				<th>Username</th>
				<th>Email</th>
				<th>Name</th>
				<th>Age</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
	  		@foreach($users as $usuario)
				<td> {{ $usuario->id }} </td>
				<td> {{ $usuario->username }} </td>
				<td> {{ $usuario->email }}</td>
				<td> {{ $usuario->name }}</td>
				<td> {{ $usuario->age }}</td>
				<td> 
					<a href="{{ action('UserController@updateUser', $usuario->id) }}" class="btn btn-default">Edit</a>
					<a href="{{ action('UserController@deleteUser', $usuario->id) }}" class="btn btn-danger">Delete</a>
				</td>
			<br>
			@endforeach
			<a href="{{ action('UserController@addUser') }}" class="btn btn-success">Add User</a>
			</tr>
		</tbody>
	</table>
	</div>
</div>
</section> 
@stop
