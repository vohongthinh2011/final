<?php

class FriendController extends \BaseController {

	
    public function showFriendPage(){
        
        $user = Auth::user();
        $friends = Friend
        
        return View::make('/friends');
        
    }
    
    public function addFriend(){
        
        
    }


}
