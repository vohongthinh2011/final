@extends('layouts.nav_master')

@section('title')
<title>Search Results</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/feed.css">

@stop

@section('content')


<div class="col-xs-4 col-sm-3">
  <div class="container-fluid">
    
    <div class="panel panel-default">
            <div class="panel-heading"><h3>{{$user->full_name}}</h3></div>
            <table class="table table-striped">
                <tr><p><img src="/images/{{$user->profile_pic}}" class="profile-pic"></p></tr>
                <tr><p>{{$user->gender}}</p></tr>
                <tr><p>{{$user->date_of_birth}}</p></tr>
                <tr><p><a href="/feed">Back to Feed</a></p></tr>
            </table>
        </div>
            
    </div>
</div>
<div class="col-xs-10 col-sm-6 multi-vertical-scroll">
    <div class="container-fluid">
    @foreach($reviews as $review)
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{$review->name}} posted a review on {{$review->created_at}}</h3>
            
        </div>
        <div class="panel-content">
            <img src="/images/{{$review->profile_pic}}" class="profile-pic"><br>
            <h3>{{$review->movie_title}}:</h3><br>
            {{$review->content}}<br>
        </div>
        </div>
    @endforeach  
   </div>           
</div>
<div class="col-xs-4 col-sm-3">
    <div class="container-fluid">
        
    </div>
</div>


<
@stop

