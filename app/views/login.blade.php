@extends('layouts.master')

@section('title')
	<title>Cinemaphile | Login Page</title>
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="/css/login.css"/>
	<!--<script type="text/javascript" href="/js/login.js"/>-->
@stop

@section('content')
	<div class="container">
		<div class="login-triangle"></div>
		<div>
			<h1 align="center">Log in</h1>
		</div>

		
		{{Form::open(['action' => 'AuthenticationController@loginUser', 'method' => 'POST'])}}

		<div class="form-group login-userName">
			{{ Form::email('email', null, [ 'placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
		</div>

		<div class="form-group login-password">
			{{ Form::password("password" , [ 'placeholder' => 'Password', 'class' => 'form-control', 'required'])}}
		</div>
		<div class="form-group submitButton">
			{{ Form:: submit('Login', [ 'class' => 'btn btn-primary btn-block']) }}
			{{Form::close()}}
		</div>
		<div class="form-group signUpNewAcc">
			<p class="text-center">Don't have an account? <a href="/signup" class="btn btn-link">Sign up</a></p>
		</div>
	</div>

@stop
