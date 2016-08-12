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

Route::get('/', function(){
    return Redirect::to('/login');
});
Route::get('/signup', 'RegistrationController@showSignUpView');
Route::post('/signup', 'RegistrationController@signUp');

Route::get('/feed', 'FeedController@showFeed');

Route::get('/login', 'AuthenticationController@showLoginView');
Route::post('/login', 'AuthenticationController@loginUser');
Route::get('/logout', 'AuthenticationController@logout');

Route::get('/search', 'SearchController@showSearchView');
Route::post('/search', 'SearchController@SearchMovieID');

//review
Route::post('/review', 'ReviewController@postReview');

//reactions
Route::post('/reaction', 'ReactionController@postReaction');

//friends 
Route::get('/friends', 'FriendController@showFriendPage');
Route::post('/friends', 'FriendController@addFriend');

//profile
Route::get('/profile', 'ProfileController@showProfile');
Route::post('/profile', 'ProfileController@editProfile');

