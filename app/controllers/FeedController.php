<?php

class FeedController extends \BaseController {

	public function showFeed(){

		if(!Auth::check()){
			return Redirect::to('/login');
		}

		$user = Auth::user();
        
        //run default profile pic if picture was deleted
        // if(!file_exists('public/images/'.$user->profile_pic)){
        //     $user->profile_pic = 'default_picture.jpg';
        //     $user->save();
        // }
        
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
        
		$review_response = [];

		foreach($feed_reviews as $feed_review){
			$review_response[$feed_review->review_id] = Reaction::where('review_id', '=', $feed_review->review_id)->get();
		}

		return View::make('feed', [
			'user' => $user,
			'reviews' => $feed_reviews,
			'responses' => $review_response,
		]);
	}

}
