<?php

class FeedController extends \BaseController {

	public function showFeed(){

		if(!Auth::check()){
			return Redirect::to('/login');
		}

		$user = Auth::user();

		// How can we loop through using the friends table???
		$reviews = Review::where('UID', '=', $user->id)->get();

		$reactions = [];

		foreach($reviews as $review){
			$reactions[$review->id] = Reaciton::where('RID', '=', $review->id)->get();
		}

		return View::make('feed', [
			'user' => $user,
			'reviews' => $reviews,
			'reactions' => $reactions
		]);
	}

}
