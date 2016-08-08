@extends('layouts.nav_master')

@section('title')
<title>Search Results</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/searchresult.css">

@stop

@section('content')


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
