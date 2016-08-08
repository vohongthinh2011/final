<?php

class ReviewController extends \BaseController {
    
    
   
    public function postReview(){
        
        if(!Input::has('content')){
            $validation = Validator::make(Input::all(),[
                'movies' => 'required',
                'count' => 'required',
                'movie_number' => 'required',
            ]);
            
            if($validation->fails()){
                $messages = $validation->messages();
                Session::flash('validation_messages', $messages);
                
            }
            $movies_string = Input::get('movies');
            $movie_count = (int)Input::get('count');
            $movie_number = (int)Input::get('movie_number');
            $movies_array = json_decode($movies_string, true);
            
            
            return View::make('/search', [
                'movie_results' => $movies_array,
                'count' => $movie_count,
                'movie_number' => $movie_number]);
           
            
        }
        else{ 
        
        $validation = Validator::make(Input::all(),[
            'content' => 'required',
            //'rating' => 'required',
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
        //$rating = Input::get('rating');
        $movie_id = Input::get('movieid');
        $movie_title = Input::get('movietitle');
        
        try{
            $review = Review::create([
                'user_id' => $user->id,
                'content' => $content,
                //'rating' => $rating,
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

}
