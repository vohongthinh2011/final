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
    {{Form::open(['action' => 'ProfileController@addImage', 'method' => 'POST', 'files' => true])}}
    {{Form::file('picture')}}
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {{Form::close()}}
@stop 
