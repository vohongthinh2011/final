<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToReactionsAndReviews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reviews', function(Blueprint $table){
            $table->string('name')->after('user_id');
            $table->string('profile_pic')->after('user_id');
            $table->integer('likes')->after('rating');
        });
        
        Schema::table('reactions', function(Blueprint $table){
           $table->string('name')->after('user_id');
           $table->string('profile_pic')->after('content'); 
        });
        
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reviews', function(Blueprint $table){
            $table->dropColumn('name');
            $table->dropColumn('profile_pic');
            $table->dropColumn('likes');
        });
        
        Schema::table('reactions', function(Blueprint $table){
           $table->dropColumn('name');
           $table->dropColumn('profile_pic'); 
        });
	}

}
