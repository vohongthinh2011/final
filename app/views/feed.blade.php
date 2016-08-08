@extends('layouts.nav_master')

@section('title')
	<title>My Feed Page</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/feed.css">
@stop

@section('content')


              @foreach($reviews as $review)
                  <p>{{$user->full_name}} posted a review on {{$review->updated_at}} about {{$review->movie_title}}</p>
                  <blockquote>{{$review->content}}</blockquote>
            @endforeach 


@stop