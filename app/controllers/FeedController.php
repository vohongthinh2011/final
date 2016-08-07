<?php

class FeedController extends \BaseController {

	public function showFeed(){

		if(!Auth::check()){
			return Redirect::to('/login');
		}

		$user = Auth::user();

		// How can we loop through using the friends table???
		$reviews = Review::where('user_id', '=', $user->id)->get();

		$reactions = [];

		foreach($reviews as $review){
			$reactions[$review->id] = Reaction::where('review_id', '=', $review->id)->get();
		}

		return View::make('feed', [
			'user' => $user,
			'reviews' => $reviews,
			'reactions' => $reactions
		]);
	}

}
