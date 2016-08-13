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
		{{ Form:: submit('Sign Up', ['class' => 'btn btn-default btn-lg btn-block signup-input-bar']) }}
        <div class="login"><h4 align="center"><a href="/login">Go Back to Login</a></div></h4>
	{{ Form::close()}}

</div> 


<!--


<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>
			<h1 align="center">Sign Up</h1>
			</div>
		</div>
		<br>
		<div align="center" class="signup">
			{{ Form::open(['action'=> 'RegistrationController@signUp', 'method' => 'POST']) }}


<!-- 				<input type="text" placeholder="username" name="user"><br> - ->
				{{ Form::text('full_name', null, [ 'placeholder' => 'Name', 'class' => 'form-control', 'required']) }}

				{{ Form::text('username', null, [ 'placeholder' => 'Username', 'class' => 'form-control', 'required']) }}
				{{ Form::email('email', null, [ 'placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
				{{ Form::password('password' , [ 'placeholder' => 'Password', 'class' => 'form-control', 'required']) }}
				{{ Form::password('repassword' , [ 'placeholder' => 'Re Type Password', 'class' => 'form-control', 'required']) }}
				{{Form::radio('gender', 'male', ['class' => 'form-control'])}}<label>Male</label>
                {{Form::radio('gender', 'female', ['class' => 'form-control'])}}<label>Female</label>
                <br>
                {{Form::selectRange('day', 01, 31)}}
            	{{Form::selectMonth('month')}}
				{{Form::selectYear('year', 1920, 2016, 2016)}}
				{{ Form::text('question', null, [ 'placeholder' => 'Verification Question', 'class' => 'form-control', 'required']) }}
				{{ Form::text('answer' , null, [ 'placeholder' => 'Verification Answer', 'class' => 'form-control', 'required']) }}

<!-- 				<input type="button" value="Login"> - ->
				{{ Form:: submit('Sign Up', ['class' => 'btn btn-primary btn-lg btn-block signup-input-bar']) }}
			{{Form::close()}}

			<div class="login"><a href="/login">Go Back to Login</a></div>
		</div>
-->
@stop
