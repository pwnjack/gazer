<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bugs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('buggable_id');
			$table->string('buggable_type');
			$table->integer('user_id');
			$table->integer('assignee_id');
			$table->string('title');
			$table->string('slug');
			$table->text('description')->nullable();
			$table->datetime('execution_date');
			$table->integer('status_id');
			$table->integer('priority_id');
			$table->string('commit_url');
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
		Schema::drop('bugs');
	}

}
