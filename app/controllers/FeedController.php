<?php

class FeedController extends \BaseController {

	public function showFeed(){

		if(!Auth::check()){
			return Redirect::to('/login');
		}

		$user = Auth::user();
        
        //get network of user and friends
        $friends1 = $user->friendsUserRequested;
        $friends2 = $user->friendsUserAccepted;
        $friends = $friends1->merge($friends2);
        $network = $friends->add($user);
        
       // $test = $user->movieReviews;
        //get reviews of entire network
        $reviews = Review::all();
        $feed_reviews = [];
        foreach($network as $users){
            foreach($reviews as $review){
                if($review->user_id == $users->id)
                {
                    $review->setProfilePic($users->profile_pic);
                    $feed_reviews[count($feed_reviews)] = $review;
                }
            }
        }
        //reverse sort newest to oldest feed news
        $feed_reviews = array_reverse($feed_reviews);
        /*
		$review_response = [];

		foreach($feed_reviews as $feed_review){
			$review_response[$feed_review->id] = Reaction::where('review_id', '=', $review->id)->get();
		}*/

		return View::make('feed', [
			'user' => $user,
			'reviews' => $feed_reviews,
			//'response' => $review_response,
		]);
	}

}
