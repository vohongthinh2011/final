@extends('layouts.master')

@section('title')
<title>Cinemaphile | Sign Up</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/signup.css">
@stop

@section('content')
 <div class="container">
	<h1 align="center">Sign Up Form</h1>
	<p align="center">Sign up an new account free and join our community!</p>

	{{ Form::open(['action'=> 'RegistrationController@signUp', 'method' => 'POST']) }}

		<div class="form-group fullName">
		{{ Form::text('full_name', null, [ 'placeholder' => 'Name', 'class' => 'form-control', 'required']) }}
		</div>

		<div class="form-group userName">
		{{ Form::text('username', null, [ 'placeholder' => 'Username', 'class' => 'form-control', 'required']) }}
		</div>

		<div class="form-group email">
		{{ Form::email('email', null, [ 'placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
		</div>

		<div class="form-group password">
		{{ Form::password('password' , [ 'placeholder' => 'Password', 'class' => 'form-control', 'required']) }}
		</div>

		<div class="form-group repassword">
		{{ Form::password('repassword' , [ 'placeholder' => 'Re Type Password', 'class' => 'form-control', 'required']) }}
		</div>
        
        <div class="form-group signup-input-bar">
                <label>{{Form::radio('gender', 'male', ['class' => 'form-control'])}} Male</label>
                <label>{{Form::radio('gender', 'female', ['class' => 'form-control'])}} Female</label>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label class="control-label">DOB</label>
            
            
                    {{Form::selectRange('day', 01, 31)}}
            
                    {{Form::selectMonth('month')}}
            
                    {{Form::selectYear('year', 1920, 2016, 2016)}}
            </div>
        </div>    
        <div class="form-group signup-input-bar">
		{{ Form::text('question', null, [ 'placeholder' => 'Verification Question', 'class' => 'form-control', 'required']) }}
		</div>
        
        <div class="form-group signup-input-bar">
		{{ Form::text('answer' , null, [ 'placeholder' => 'Verification Answer', 'class' => 'form-control', 'required']) }}
		</div>
		<!-- {{ Form:: submit('Sign Up', ['class' => 'btn btn-default btn-lg btn-block signup-input-bar']) }} -->
		<div class="form-group">
		<button>Sign Up</button>
		</div>

        <div class="login">
			<p class="text-center">Already a User?
			<br>
			<a href="/login">Log In</a></p>
		</div>
	{{ Form::close()}}

</div> 

@stop
