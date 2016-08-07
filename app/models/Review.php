<?php

class Comment extends Eloquent{



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';

	protected $fillable = ['user_id', 'content', 'rating', 'in_sync', 'movie_title', 'movie_id'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}