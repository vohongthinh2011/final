@extends('layouts.nav_master')

@section('title')
<title>Search Results</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/searchresult.css">

@stop

@section('content')


<div class="col-xs-4 col-sm-3 multi-vertical-scroll">
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
        
            @for($i = 0; $i < $count; $i++)
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
            <div class="modal fade" id="{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            Movie ID: {{$movie_results[$i]['id']}}<br>
                            Language: {{$movie_results[$i]['original_language']}}<br>
                            Adult: {{$movie_results[$i]['adult']}}<br>
                            @if(gettype($movie_results[$i]['genre_ids']) == "array")
                                Genre: 
                                @foreach($movie_results[$i]['genre_ids'] as $genre_id)
                                    {{$genre_id}}    
                                @endforeach  
                                <br>
                            @endif 
                            <hr class="line-break">
                            Movie Description: {{$movie_results[$i]['overview']}}<br>
                            <hr class="line-break">
                            RATINGS(TMDB):<br>
                            Popularity: {{$movie_results[$i]['popularity']}}<br>
                            Number of Votes: {{$movie_results[$i]['vote_count']}}<br>
                            Average Rating per Vote: {{$movie_results[$i]['vote_average']}}<br><br>
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
                        </div>
                        <div class="modal-footer">
                            {{Form::button('Close', ['class' => 'btn-btn-alert', 'data-dismiss' => 'modal'])}}
                            {{Form::submit('Post', ['class' => 'btn btn-primary btn-lg'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            @endfor
            
        @endif 
        
    </div>
</div>


<div class="col-xs-10 col-sm-6 multi-vertical-scroll">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-star-empty"></span> RATE THE MOVIE</a>
            </div>
        </div>
    </nav>       
</div>
<div class="col-xs-4 col-sm-3 multi-vertical-scroll">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-film"></span> RECOMMENDED</a>
            </div>
        </div>
    </nav>
</div>


@stop
