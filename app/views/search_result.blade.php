@extends('layouts.master')

@section('title')
<title>Search Results</title>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/css/searchresult.css">
@stop

@section('content')

<div class="col-xs-4 col-sm-3" id="left">
    <p>
MOVIE LIST:<br><br><br>
@for($i = 0; $i < $count; $i++)
    
    Pictures: {{$movie_results[$i]['poster_path'] . "\t" . $movie_results[$i]['backdrop_path']}}<br>
    Title: {{$movie_results[$i]['original_title']}}<br>
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
    <br>
    RATINGS(TMDB):<br>
    Popularity: {{$movie_results[$i]['popularity']}}<br>
    Number of Votes: {{$movie_results[$i]['vote_count']}}<br>
    Average Rating per Vote: {{$movie_results[$i]['vote_average']}}<br>
    <br>
    RATINGS(CINEMAPHILE):<br>
    Number of Votes: <br>
    Average Rating per Vote: <br>
    Rating relative to genre: <br>
    <br><br>

@endfor 

    </p>
</div>
<div class="col-xs-10 col-sm-6" id="center">
    <p>MOVIE TO RATE</p>
</div>
<div class="col-xs-4 col-sm-3" id="right">
    <p>RECOMMENDED FOR YOU</p>
</div>
@stop
