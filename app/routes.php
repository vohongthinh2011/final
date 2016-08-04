<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('/home', 'HomeController@showWelcome');
Route::get('/hello', 'HomeController@showWelcome');


Route::get('/signup', 'RegistrationController@showSignUpView');
Route::post('/signup', 'RegistrationController@signUp');

Route::get('/feed', function() {
	return View::make('feed');
});

Route::get('/login', 'AuthenticationController@showLoginView');
Route::post('/login', 'AuthenticationController@loginUser');

Route::get('/search', 'SearchController@showSearchView');
Route::post('/search', 'SearchController@SearchMovieID');

