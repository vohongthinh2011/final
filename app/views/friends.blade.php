@extends('layouts.nav_master')

@section('title')
	<title>My Friends Page</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/friends.css">
@stop

@section('content')

<div class="container">
    <div class="row-fluid">
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><h2>{{$user->full_name}}</h2></div>
                    </div>
                    <div class="panel-content">
                        <img src="/images/{{$user->profile_pic}}" class="profile-pic">
                        <hr class="line-break">
                        <div class="text-center">
                        Gender: {{$user->gender}}<br>
                        DOB: {{$user->date_of_birth}}<br>
                        <a href="/feed">Back to Feed</a><br>
                        </div>
                    </div>
            </div>
             <div class="panel panel-default">
                <div class="panel-heading"><h5>Friend Requests</h5></div>
                <table class="table table-hover">
                    @foreach($friend_requests as $friend_request)
                        <tr>
                            {{Form::open(['action' => 'FriendController@addFriend', 'method' => 'POST', 'class' => 'form'])}}
                            <th><img src="/image/{{$friend_request->profile_pic}}" class="mini-pic"></th>
                            <th>{{$friend_request->full_name}} has sent you a friend request</th>
                            
                            {{Form::hidden('request_id', $friend_request->id)}}
                            <th>{{Form::submit('Accept', ['class' => 'btn btn-default'])}}</th>
                            {{Form::close()}}
                        </tr>
                    @endforeach 
                </table>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Search For Friends</h4></div>
                <div class="panel-body">
            
                {{Form::open(['action' => 'FriendController@addFriend', 'method' => 'POST', 'class' => "form"])}}
                    <div class="form-group">
                        <input name="email" type="email" placeholder="Type Friend's Email" class="form" required>
                        {{Form::submit('Send Request', ['class' => 'btn btn-default'])}}
                    </div>                
                {{Form::close()}}
                </div>
            </div>
        
           
            
                <a data-toggle="collapse" href="#expandFriends" aria-expanded="false" aria-controls="expandFriends">
                    <h4>Show List of Friends</h4>
                </a>
                <div class="list-border">
                <div class="collapse" id="expandFriends">
                    <div class="container-fluid list-border">
                    @foreach($friends as $friend)
                        <div class="friend-list">
                            <img src="/images/{{$friend->profile_pic}}" class="mini-pic">
                            <a href="#" style="font-size:150%">{{$friend->full_name}}</a>
                            <br>
                            Friend since: {{$friend->pivot->created_at}}
                        </div>
                        <hr class="line-break">
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop