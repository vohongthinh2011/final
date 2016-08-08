@extends('layouts.nav_master')

@section('title')
	<title>My Feed Page</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/feed.css">
@stop

@section('content')
<div class="container-fluid">
	<h1>My Feed Page</h1>
    @foreach($reviews as $review)
        <p>{{$user->full_name}} posted a review on {{$review->created_at}} about {{$review->movie_title}}</p>
    @endforeach
</div>
@stop