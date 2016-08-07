<?php

use Tmdb\Laravel\Facades\Tmdb;

class SearchController extends \BaseController {

	function showSearchView() {
		return View::make('search');
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
        
        return View::make('search_result', ['count' => $num_of_results,
                                            'movie_results' => $search_details,
                                             ]);
	
	
    }
}
