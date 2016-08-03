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

		// Makes the JSON output into an array
		$search_result = json_encode(Tmdb::getMoviesApi()->getMovie($input));

		

		return View::make('search_result')->with('data', $search_result);
	}

}
