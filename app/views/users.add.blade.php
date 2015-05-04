@extends('layouts')

@section('sidebar')
     @parent
     Formulario de usuario
@stop

@section('content')
        {{ HTML::link('users', 'back'); }}
        <h1>Crear Usuario</h1>
        {{ Form::open(array('url' => 'users/create')) }}
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '')}}
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '')}}
            {{Form::submit('Save')}}
        {{ Form::close() }}
@stop