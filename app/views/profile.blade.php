@extends('layouts.nav_master')

@section('title')
    <title>My Profile Page</title>
@stop 

@section('style')
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
@stop 

@section('content')
       
<div class="col-xs-4 col-sm-3">
  <div class="container-fluid">
    
    <div class="panel panel-default">
            <div class="panel-heading">
            <img src="/images/{{ $user->profile_pic }}" class="profile-pic"><h2>{{$user->full_name}}'s Profile</h2>
            <div class="uploadPic">
            {{Form::open(['action' => 'ProfileController@editProfile', 'method' => 'POST', 'files' => true])}}
            {{Form::file('picture')}}
            {{Form::submit('submit', ['class' => 'btn btn-default'])}}
            {{Form::close()}}
            </div>
            <h5 align="center">Gender: </p>{{$user->gender}}
            <h5 align="center">Date of Birth: </h5>
            <h5 align="center">{{ $user->date_of_birth }}</h5>
            <h5 align="center">Number of Friends: </h5>
            <h5 align="center">{{$user->num_of_friends}}</h5>
            </div>
        </div>
            
    </div>
    
</div>

<div class="col-xs-12 col-sm-9">
    <div class="container-fluid">
    @foreach($reviews as $review)
        <div class="panel panel-default">
        <div class="panel-heading">
        <img src="/images/{{$user->profile_pic}}" class="profile-pic"><br>
            <h3 class="panel-title">{{$review->name}} posted a review on {{$review->created_at}}</h3>
            
        </div>
        <div class="panel-content">
            
            <h3>{{$review->movie_title}}:</h3><br>
            <blockquote>{{$review->content}}</blockquote>
            <blockquote>{{$review->rating}}/10</blockquote>
            
        </div>
        @foreach($responses[$review->review_id] as $response)
           <div class="response">
               <p>{{$response->name}} responded at {{$response->created_at}}</p>
               <p>{{$response->content}}</p>
            </div>
        @endforeach 

        </div>       
    @endforeach  
   </div>           
</div>
<div class="col-xs-4 col-sm-3">
    <div class="container-fluid">
        
    </div>
</div>
            
                


@stop 
