@extends('layouts.master')

@section('title')
	<title>Search Page</title>
@stop

@section('content')
<div>
	<h1>Search a Movie by ID</h1>
	{{ Form::open(['action'=> 'SearchController@SearchMovieID', 'method' => 'POST']) }}

		{{ Form::text('input', null, [ 'placeholder' => 'Movie ID', 'required']) }}

		{{ Form:: submit('Sign Up') }}

		{{ Form::close() }}
</div>
@stop