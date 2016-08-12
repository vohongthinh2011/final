<?php

use Tmdb\Laravel\Facades\Tmdb;

class SearchController extends \BaseController {

	function showSearchView() {
		return View::make('search', ['count' => 0]);
	}

	function SearchMovieID() {
		$validation = Validator::make(Input::all(), [
			'input' => 'required'
			]);
		$input = Input::get('input');

        $search_result = Tmdb::getSearchApi()->searchMovies($input);
        
     
        //get movie details for all movies matching search input
        $search_details = $search_result['results'];
        //get total number of movie results 
        $num_of_results = count($search_details);
        $movie_reviews = Review::all();
        $movie_review_reacions = Reaction::all();
        $users = User::all();
        
        return View::make('search', [
        	'count' => $num_of_results, 
        	'movie_results' => $search_details, 
        	'movie_reviews' => $movie_reviews,
        	'movie_review_reacions' => $movie_review_reacions, 
        	'users' => $users ]);	
    }
}
