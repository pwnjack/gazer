<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilestonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('milestones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('branch_id');
			$table->integer('user_id');
			$table->string('title');
			$table->string('slug');
			$table->text('description')->nullable();
			$table->datetime('start');
			$table->datetime('end');
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
		Schema::drop('milestones');
	}

}
