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
                    Release date: {{$movie_results[$i]['release_date']}}<br>
                    Language: {{$movie_results[$i]['original_language']}}<br>
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
                    </div>
                    {{Form::open(['action' => 'ReviewController@postReview', 'method' => 'POST', 'class' => "form"])}}
                    {{Form::hidden('movies', json_encode($movie_results))}}
                    {{Form::hidden('count', $count)}}
                    {{Form::hidden('movie_number', $i)}}
                    <div class="panel-footer">
                        {{Form::submit('Rate it', ['class' => 'btn btn-block btn-lg btn-default'])}}
                    </div>
                    {{form::close()}}
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
    @if(isset($movie_number))
    
       <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{$movie_results[$movie_number]['original_title']}}</h3>
            </div>
            <div class="panel-content">
            {{HTML::image('https://image.tmdb.org/t/p/w185'.$movie_results[$movie_number]['poster_path'], null, ['class' => 'img-rounded centering-image'])}}<br> 
            {{HTML::image('https://image.tmdb.org/t/p/w185'.$movie_results[$movie_number]['backdrop_path'], null, ['class' => 'img-rounded centering-image'])}}<br>
            <hr class="line-break">
            Release date: {{$movie_results[$movie_number]['release_date']}}<br>
            Movie ID: {{$movie_results[$movie_number]['id']}}<br>
            Language: {{$movie_results[$movie_number]['original_language']}}<br>
            Adult: {{$movie_results[$movie_number]['adult']}}<br>
            @if(gettype($movie_results[$movie_number]['genre_ids']) == "array")
                Genre: 
                @foreach($movie_results[$movie_number]['genre_ids'] as $genre_id)
                    {{$genre_id}}    
                @endforeach  
                <br>
            @endif 
            <hr class="line-break">
            Movie Description: {{$movie_results[$movie_number]['overview']}}<br>
            <hr class="line-break">
            RATINGS(TMDB):<br>
            Popularity: {{$movie_results[$movie_number]['popularity']}}<br>
            Number of Votes: {{$movie_results[$movie_number]['vote_count']}}<br>
            Average Rating per Vote: {{$movie_results[$movie_number]['vote_average']}}<br><br>
            <hr class="line-break">
            RATINGS(CINEMAPHILE):<br>
            Number of Votes: <br>
            Average Rating per Vote: <br>
            Rating relative to genre: <br>
            <hr class="line-break">
            {{Form::open(['action' => 'ReviewController@postReview', 'method' => 'POST', 'class' => "form"])}}
            <textarea name="content" class="form-control review-box" rows="10"></textarea>
            </div>
            {{Form::hidden('movieid', $movie_results[$movie_number]['id'])}}
            {{Form::hidden('movietitle', $movie_results[$movie_number]['original_title'])}}
            <div class="panel-footer">
                {{Form::submit('Post', ['class' => 'btn btn-primary btn-lg'])}}
            </div>
            {{Form::close()}}
        </div>
  
    @endif 
   </div>           
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
