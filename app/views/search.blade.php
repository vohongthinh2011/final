@extends('layouts.nav_master')

@section('title')
<title>Search Results</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/searchresult.css">

@stop

@section('content')


<div class="col-xs-12 ">
  <div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-search"></span> RESULTS</a>
            </div>
        </div>
    </nav>

    @if($count > 0)
        
        @for ($i = 0; $i < $count; $i++)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$movie_results[$i]['original_title']}}</h3>
                </div>
                <div class="panel-content">
                    <div class="row">                   
                        <div class="col-xs-4">
                            {{HTML::image('https://image.tmdb.org/t/p/w185'.$movie_results[$i]['poster_path'], null, ['class' => 'img-rounded centering-image'])}}
                        </div>
                         <div class="col-xs-8">
                            Release date: {{$movie_results[$i]['release_date']}}<br>
                            <hr class="line-break">
                            {{$movie_results[$i]['overview']}}<br>                
                            <hr class="line-break">
                            RATINGS(TMDB):<br>
                            Number of Votes: {{$movie_results[$i]['vote_count']}}<br>
                            Average Rating per Vote: {{$movie_results[$i]['vote_average']}}/10<br><br>
                            <hr class="line-break">
                            RATINGS(CINEMAPHILE):<br>
                            Number of Votes: <br>
                            Average Rating per Vote: <br>
                            <br>                                            
                         </div>
                    </div>
                    <div class="panel-footer">
                        {{Form::button('What is your Review?', ['class' => 'btn btn-block btn-lg btn-default',
                            'data-toggle' => 'modal', 'data-target' => '#'.$i])}}
                         <br>
                    </div>  
                </div>
                <div class="modal fade" id="{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" area-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel">{{$movie_results[$i]['original_title']}}</h3>
                        </div>
                        <div class="modal-body">
                            {{HTML::image('https://image.tmdb.org/t/p/w185'.$movie_results[$i]['poster_path'], null, ['class' => 'img-rounded centering-image'])}}<br>                    
                            <hr class="line-break">
                            {{Form::open(['action' => 'ReviewController@postReview', 'method' => 'POST', 'class' => "form"])}}  
                            {{Form::radio('rating', '1', ['class' => 'form-control'])}}<label>1</label>
                            {{Form::radio('rating', '2', ['class' => 'form-control'])}}<label>2</label>
                            {{Form::radio('rating', '3', ['class' => 'form-control'])}}<label>3</label>
                            {{Form::radio('rating', '4', ['class' => 'form-control'])}}<label>4</label>
                            {{Form::radio('rating', '5', ['class' => 'form-control'])}}<label>5</label>
                            <textarea name="content" class="form-control review-box" rows="5"></textarea>                            
                            {{Form::hidden('movieid', $movie_results[$i]['id'])}}
                            {{Form::hidden('movietitle', $movie_results[$i]['original_title'])}}
                            {{Form::submit('Post', ['class' => 'btn btn-primary btn-lg'])}}
                            {{Form::close()}}
                            @foreach($movie_reviews as $review)
                            <div class="panel-default">                           
                                @if($review->movie_id == $movie_results[$i]['id'])
                                <div class="panel-heading">
                                    <img src="/images/{{$review->profile_pic}}" class="profile-pic">                                                       
                                    <h3 class="panel-title">{{$review->name}} posted a review on {{$review->created_at}}</h3>
                                    {{$review->content}}
                                </div>
                                    <div class="panel-content">
                                               
                                        @foreach($movie_review_reactions as $reaction) 

                                            @if($reaction->review_id == $review->review_id)                                            
                                            <div class="response">
                                            <img src="/images/{{$review->profile_pic}}" class="profile-pic">                                            
                                            {{ $reaction->name }} responded with {{ $reaction->content}} on {{ $reaction->created_at}}
                                            </div>                                                                                
                                            @endif
                                                                               
                                        @endforeach   
                                        </div>                                       
                                        {{Form::open(['action' => 'ReactionController@postReaction', 'class' => 'form', 'method' => 'POST'])}}
                                            
                                            <h6></h6>
                                            
                                            <div class="form-group">                                            
                                            <textarea name="content">Join in on the conversation!</textarea>
                                            
                                            </div>
                                            <span>
                                            {{Form::hidden('reviewid', $review->review_id)}}
           
                                            {{Form::submit('React!', ['class' => 'btn btn-primary btn-lg'])}}
                                            </span>
                                            
                                            
                                            {{Form::close()}}                               
                                @endif
                            </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
            </div>
        @endfor            
    @endif         
@stop
