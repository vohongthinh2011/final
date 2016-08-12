<?php
//oihfqwihgpqwh

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('full_name', 255);
			$table->string('username', 255);
			$table->string('email', 255);
			$table->string('password', 255);
			$table->date('date_of_birth');
			$table->string('location', 255);
			$table->string('profile_pic', 255);
			$table->integer('number_of_friends');
			$table->enum('gender', ['male', 'female']);
			$table->string('verification_question', 255);
			$table->string('verification_answer', 255);
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
