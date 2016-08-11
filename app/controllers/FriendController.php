<?php

class FriendController extends \BaseController {

	
    public function showFriendPage(){
        
        $user = Auth::user();
        
        $friends1 = $user->friendsUserRequested;
        $friends2 = $user->friendsUserAccepted;
        
        //merge both queries defined in User model to yeild User queries of all $friends
        $friends = $friends1->merge($friends2);
        
        return View::make('friends', [
            'user' => $user,
            'friends' => $friends,
        ]); 
        
    }
    
    public function addFriend(){
        
        //validate input  
        $validation = Validator::make(Input::all(),[
            'email' => 'required',
        ]);
        
        if($validation->fails()){
            $messages = $validation->messages();
            Session::flash('validation_messages', $messages);
            return Redirect::back()->withInput();
        }
        
        $user = Auth::user();
        $email = Input::get('email');
        
        //check if friend exists in db 
        $count = User::where('email', '=', $email)->count();
        if($count < 1){
            Session::flash('error_message', 'Invalid email, try again');
            return Redirect::back()->withInput();
        } 
        //retrieve first result 
        $friend_query = User::where('email', '=', $email)->first();
        
        try{
            //adds to pivot table
            $user->friendsUserRequested()->attach($friend_query->id);
            $user->num_of_friends += 1;
            $user->save();
            
        }catch(Exception $e){
            Session::flash('error_message', 'Oops! something is wrong');
            return Redirect::to('/friends');
            return Redirect::back()->withInput();
        }
        
        return Redirect::to('/friends');
        
    }


}
