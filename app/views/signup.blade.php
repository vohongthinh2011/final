@extends('layouts.master')

@section('title')
<title>Cinemaphile | Sign Up</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/signup.css">
@stop

@section('content')
<div class="container-fluid">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Cinemaphile</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	      <li><a href="#">Movies</a></li>
	      <li><a href="#">TV</a></li>
	    </ul>
	    <form class="navbar-form navbar-left" role="search">
	  		<div class="form-group">
	    		<input type="text" class="form-control" placeholder="Search">
	  		</div>
	  		<button type="submit" class="btn btn-default">Submit</button>
		</form>
		<!--sign in buttom-->
		<button type="button" class="btn btn-default navbar-btn navbar-left">Sign in</button>
	  </div>

	  
	</nav>
</div>

<div class="container">
	<h1 align="center">Sign Up</h1>
	<p align="center">Sign up an new account free and join our community!</p>

	{{ Form::open(['action'=> 'RegistrationController@signUp', 'method' => 'POST']) }}

		<div class="form-group fullName">
		{{ Form::text('full_name', null, [ 'placeholder' => 'Name', 'required']) }}
		</div>

		<div class="form-group userName">
		{{ Form::text('username', null, [ 'placeholder' => 'Username', 'required']) }}
		</div>

		<div class="form-group email">
		{{ Form::email('email', null, [ 'placeholder' => 'Email', 'required']) }}
		</div>

		<div class="form-group password">
		{{ Form::password('password' , [ 'placeholder' => 'Password', 'required']) }}
		</div>

		<div class="form-group repassword">
		{{ Form::password('repassword' , [ 'placeholder' => 'Re Type Password', 'required']) }}
		</div>

		{{ Form:: submit('Sign Up') }}

	{{ Form::close() }}

</div>

@stop
