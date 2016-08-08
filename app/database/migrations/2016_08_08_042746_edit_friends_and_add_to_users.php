<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditFriendsAndAddToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table){
            $table->integer('num_of_friends')->after('verification_answer');
        });
        
        Schema::table('friends', function(Blueprint $table){
            $table->dropColumn('friend_id');
            $table->string('name')->after('user_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table){
            $table->dropColumn('num_of_friends');
        });
        
        Schema::table('friends', function(Blueprint $table){

            $table->dropColumn('name');
            $table->integer('friend_id')->after('user_id');
        });
	}

}
