<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageThreadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_threads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id1');
			$table->integer('user_id2');
			$table->integer('has_new');
			$table->integer('last_message_id');
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
		Schema::drop('message_threads');
	}

}
