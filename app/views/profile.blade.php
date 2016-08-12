@extends('layouts.nav_master')

@section('title')
    <title>My Profile Page</title>
@stop 

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
@stop 

@section('content')
    <img src="/images/{{ $user->profile_pic }}" class="profile-pic">
    <h2>{{$user->full_name}}'s Profile</h2>
    {{Form::open(['action' => 'ProfileController@editProfile', 'method' => 'POST', 'files' => true])}}
    {{Form::file('picture')}}
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
   	<p>print something</p>
    <p>Date of Birth: </p>{{Form::$user->date_of_birth}}
    @foreach($reviews as $review)
    <p>{{$review->content}}</p>
    <p>{{$review->rating}}</p>
    <p>{{$review->movie_title}}</p>
    <p>{{$review->name}}</p>
    {{Form::close()}}




@stop 
