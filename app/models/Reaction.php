<?php


class Reaction extends Eloquent {


	
	protected $table = 'reactions';

	protected $fillable = ['review_id', 'user_id', 'content', 'name'];
	

}