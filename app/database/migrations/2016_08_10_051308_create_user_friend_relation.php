<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFriendRelation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friend_user', function(Blueprint $table){
           $table->integer('user_id');
           $table->integer('friend_id');
        });
        Schema::table('friends', function(Blueprint $table){
            $table->integer('friend_id')->after('user_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('friend_user');
        Schema::table('friends', function(Blueprint $table){
            $table->dropColumn('friend_id');
        });
	}

}
