<?php

class ReviewController extends \BaseController {
    
    
    public function showReview(){
        
        
    }
    
    
    public function postReview(){
        
        $validation = Validator::make(Input::all(),[
            'content' => 'required',
            'rating' => 'required',
            'movieid' => 'required',
            'movietitle' => 'required',
            
        ]);
        
        if($validation->fails()){
            $messages = $validation->messages();
            Session::flash('validation_messages', $messages);
            return Redirect::back()->withInput();
        }
        
        $user = Auth::user();
        
        $content = Input::get('content');
        $rating = Input::get('rating');
        $movie_id = Input::get('movieid');
        $movie_title = Input::get('movietitle');
        
        try{
            $review = Review::create([
                'user_id' => $user->id,
                'content' => $content,
                'rating' => $rating,
                'movie_id' => $movie_id,
                'movie_title' => $movie_title
            ]);
        }catch(Exception $e){
            Session::flash('error_message', 'Oops! something is wrong, try again');
            return Redirect::back()->withInput();
        }
        
        return Redirect::to('/feed');
    }

}
