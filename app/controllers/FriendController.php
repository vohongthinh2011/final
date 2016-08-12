<?php

class FriendController extends \BaseController {

	
    public function showFriendPage(){
        
        $user = Auth::user();
        
        $friends1 = $user->friendsUserRequested;
        $friends2 = $user->friendsUserAccepted;
        
        //merge both queries defined in User model to yeild User queries of all $friends
        $friends = $friends1->merge($friends2)->sortBy('created_at')->reverse();
        
        $pendingFriends1 = $user->userFriendsRequestedPending;
        $pendingFriends2 = $user->friendsUserRequestedPending;
        
        
        return View::make('friends', [
            'user' => $user,
            'friends' => $friends,
            'friend_requests' =>$pendingFriends2,
            'user_requests' =>$pendingFriends1,
        ]); 
        
    }
    
    public function addFriend(){
       
        
        $user = Auth::user();
        if(Input::has('email')){
            $validation = Validator::make(Input::all(),[
                'email' => 'required',
            ]);
            
            if($validation->fails()){
                $messages = $validation->messages();
                Session::flash('validation_messages', $messages);
                return Redirect::back()->withInput();
            }
            $email = Input::get('email');
            
            //check if friend exists in db 
            $count = User::where('email', '=', $email)->count();
            if($count < 1){
                Session::flash('error_message', 'Invalid email, try again');
                return Redirect::back()->withInput();
            }
            
            //retrieve first result 
            $friend_query = User::where('email', '=', $email)->first();
            
            //cannot friend yourself!
            if($friend_query->id == $user->id){
                Session::flash('error_message', 'Invalid email, try again');
                return Redirect::back()->withInput();
            }
            
            //check if already friends in db 
            if(DB::table('friend_user')->where('user_id', '=', $user->id)
                                    ->where('friend_id', '=', $friend_query->id)
                                    ->count() > 0)
            {
                Session::flash('error_message', 'Invalid email, try again');
                return Redirect::back()->withInput();
            } 
            
            try{
                //adds to pivot table
                $user->friendsUserRequested()->attach($friend_query->id);
                
            }catch(Exception $e){
                Session::flash('error_message', 'Oops! something is wrong');
                return Redirect::to('/friends');
                return Redirect::back()->withInput();
            }
        
        }else{
            $validation = Validator::make(Input::all(),[
            'request_id' => 'required',
            ]);
        
            if($validation->fails()){
                $messages = $validation->messages();
                Session::flash('validation_messages', $messages);
                return Redirect::back()->withInput();
            }
        
            $request_id = Input::get('request_id');
            $request_user = User::where('id','=', $request_id)->first();
            
            try{
                $relation = DB::table('friend_user')->where('user_id', '=', $request_user->id)
                                                ->where('friend_id', '=', $user->id)
                                                ->update(['accepted' => 1]);
                $user->num_of_friends += 1;
                $request_user->num_of_friends +=1;
                $user->save();
                $request_user->save();
                
            }catch(Exception $e){
                Session::flash('error_message', 'Oops! something is wrong');
                return Redirect::back();
            } 
            
        }
        return Redirect::to('/friends');
        
    }
    
}
