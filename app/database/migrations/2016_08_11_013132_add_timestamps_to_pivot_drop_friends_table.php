<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToPivotDropFriendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('friends');
        Schema::table('friend_user', function(Blueprint $table){
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('friends', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('friend_id');
            $tabile->string('name');
			$table->text('email');
			$table->timestamps();
		});
        
        Schema::table('friend_user', function(Blueprint $table){
           $table->dropColumn('created_at');
           $table->dropColumn('updated_at'); 
        });
	}

}
