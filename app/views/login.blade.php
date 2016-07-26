@extends('layouts.master')

@section('title')
	<title>Cinema | Login Page</title>
@stop

@section('content')
	<h1>Login View 12345</h1>

	{{Form::open(['action' => 'AuthenticationController@loginUser', 'method' => 'POST'])}}

		{{ Form::email('email', null, [ 'placeholder' => 'Email', 'required']) }}

		{{ Form::password("password" , [ 'placeholder' => 'Password', 'required'])}}

		{{ Form:: submit('Login') }}
	{{Form::close()}}
@stop
