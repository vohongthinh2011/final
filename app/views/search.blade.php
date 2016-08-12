@extends('layouts.nav_master')

@section('title')
<title>Search Results</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/searchresult.css">

@stop

@section('content')


<div class="col-xs-12 col-sm-12 multi-vertical-scroll">
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
                {{HTML::image('https://image.tmdb.org/t/p/w185'.$movie_results[$i]['poster_path'], null, ['class' => 'img-rounded centering-image'])}}<br>
                <hr class="line-break">
                Movie Description: {{$movie_results[$i]['overview']}}<br>
                <hr class="line-break">
                </div>
                <div class="panel-footer">
                    {{Form::button('Rate it', ['class' => 'btn btn-block btn-lg btn-default',
                        'data-toggle' => 'modal', 'data-target' => '#'.$i])}}
                </div>
            </div>
            <div class="modal fade" id="{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" area-label="Close"><spane aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel">{{$movie_results[$i]['original_title']}}</h3>
                        </div>
                        <div class="modal-body">
                            {{HTML::image('https://image.tmdb.org/t/p/w185'.$movie_results[$i]['poster_path'], null, ['class' => 'img-rounded centering-image'])}}<br> 
                            {{HTML::image('https://image.tmdb.org/t/p/w185'.$movie_results[$i]['backdrop_path'], null, ['class' => 'img-rounded centering-image'])}}<br>
                            <hr class="line-break">
                            Release date: {{$movie_results[$i]['release_date']}}<br>
                            <hr class="line-break">{{$movie_results[$i]['overview']}}<br>
                            <hr class="line-break">
                            RATINGS(TMDB):<br>
                            Number of Votes: {{$movie_results[$i]['vote_count']}}<br>
                            Average Rating per Vote: {{$movie_results[$i]['vote_average']}}/10<br><br>
                            <hr class="line-break">
                            RATINGS(CINEMAPHILE):<br>
                            Number of Votes: <br>
                            Average Rating per Vote: <br>
                            Rating relative to genre: <br>
                            <hr class="line-break">
                            {{Form::open(['action' => 'ReviewController@postReview', 'method' => 'POST', 'class' => "form"])}}
                            
                            <textarea name="content" class="form-control review-box" rows="10"></textarea>
                            
                            {{Form::hidden('movieid', $movie_results[$i]['id'])}}
                            {{Form::hidden('movietitle', $movie_results[$i]['original_title'])}}
    
                            {{Form::button('Close', ['class' => 'btn-btn-alert', 'data-dismiss' => 'modal'])}}
                            {{Form::submit('Post', ['class' => 'btn btn-primary btn-lg'])}}
                            {{Form::close()}}
                            @foreach($movie_reviews as $review)                            
                                @if($review->movie_id == $movie_results[$i]['id'])
                                <div class="review">                                                          
                                    {{ $review->name }} said {{ $review->content }}
                                </div>
                                        @foreach($movie_review_reactions as $reaction)
                                            @if($reaction->review_id == $review->review_id)
                                            <div class="response">                                            
                                            {{ $reaction->name }} responded with {{ $reaction->content}}   
                                            </div>                                                                                
                                            @endif                                            
                                        @endforeach 
                                        
                                        {{Form::open(['action' => 'ReactionController@postReaction', 'class' => 'form', 'method' => 'POST'])}}
                                            <h4>        React!</h4>
                                            <div class="form-group">                                            
                                            <textarea name="content"></textarea>
                                            </div>
                                            {{Form::hidden('reviewid', $review->review_id)}}
           
                                            {{Form::submit('Respond', ['class' => 'btn btn-default'])}}
                                            {{Form::close()}}                               
                                @endif
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endfor            
        @endif         
    </div>
</div>
@stop
