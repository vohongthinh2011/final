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
            <blockquote>{{$review->content}}</blockquote>
            
            {{Form::open(['action' => 'ReactionController@postReaction', 'class' => 'form', 'method' => 'POST'])}}
            <div class="form-group">
            <textarea name="content"></textarea>
            </div>
            {{Form::hidden('reviewid', $review->review_id)}}
           
            {{Form::submit('Respond', ['class' => 'btn btn-default'])}}
            {{Form::close()}}
            
        </div>
        </div>
        @foreach($responses[$review->review_id] as $response)
           <div class="response">
               <p>{{$response->name}} responded at {{$response->created_at}}</p>
               <p>{{$response->content}}</p>
            </div>
        @endforeach 
        
               
    @endforeach  
   </div>           
</div>
<div class="col-xs-4 col-sm-3">
    <div class="container-fluid">
        
    </div>
</div>


<
@stop

