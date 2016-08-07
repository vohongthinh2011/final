<?php


class Reaction extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reactions';

	protected $fillable = ['review_id', 'user_id', 'content'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}