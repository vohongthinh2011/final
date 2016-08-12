<?php

class Review extends Eloquent{



	protected $table = 'reviews';
    

	protected $fillable = ['user_id', 'content', 'rating', 'in_sync', 'movie_title', 'movie_id', 'name'];
	
     
     //append profile pics to rows for feed 
     public function setProfilePic($pic)
     {
         $this->profile_pic = $pic;
     }
     
}