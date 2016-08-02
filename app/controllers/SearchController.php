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

		return Tmdb::getMoviesApi()->getMovie($input);
	}

}
