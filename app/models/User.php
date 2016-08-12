<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	
	protected $table = 'users';

	protected $fillable = ['full_name', 'username', 'password', 'date_of_birth', 'location', 'profile_pic', 'gender', 'email', 'verification_question', 'verification_answer', 'num_of_friends'];

	protected $hidden = array('password', 'remember_token');
    
    
    //use pivot table and many-to-many relation to retrieve User queries of all friends that user requested
    public function friendsUserRequested()
    {
        return $this->belongsToMany('User', 'friend_user', 'user_id', 'friend_id')->where('accepted', '=', 1)->withTimestamps();
        
       
    }
    //use pivot table and many-to-many relation to retrieve User queries of all friens that user accepted
    public function friendsUserAccepted()
    {
        return $this->belongsToMany('User', 'friend_user', 'friend_id', 'user_id')->where('accepted', '=', 1)->withTimestamps();
    }
    
    
    public function userFriendsRequestedPending()
    {
        return $this->belongsToMany('User', 'friend_user', 'user_id', 'friend_id')->where('accepted', '=', 0)->withTimestamps();
    }
    
    public function friendsUserRequestedPending()
    {
        return $this->belongsToMany('User', 'friend_user', 'friend_id', 'user_id')->where('accepted', '=', 0)->withTimestamps();
    }
    
    
    
    
    
    
    
    
    
}
