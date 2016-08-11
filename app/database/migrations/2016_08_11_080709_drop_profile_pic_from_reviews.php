<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropProfilePicFromReviews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reviews', function(Blueprint $table){
            $table->dropColumn('profile_pic');
            $table->string('movie_pic');
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
           $table->string('profile_pic');
           $table->dropColumn('movie_pic');
       });
	}

}
