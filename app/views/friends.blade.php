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
        <div class="col-md-4">
            <div class="profile">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{$user->name}}</h1></div>
                    <table class="table table-striped">
                        <tr><p><img src="/images/{{$user->profile_pic}}" class="profile-pic"></p></tr>
                        <tr><p>{{$user->gender}}</p></tr>
                        <tr><p>{{$user->date_of_birth}}</p></tr>
                        <tr><p><a href="/feed">Back to Feed</a></p></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="request-form">
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
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Friend's List</h5></div>
                        <table class="table table-hover">
                        @foreach($friends as $friend)
                            <tr>
                            <th>Name: {{$friend->full_name}}</th>
                            <th>Email: {{$friend->email}}</th>
                            <th>Friend since: {{$friend->pivot->created_at}}</th>
                            </tr>
                        @endforeach
                        </table>
                        
                </div> 
            </div>
        </div>
    </div>
</div>
@stop