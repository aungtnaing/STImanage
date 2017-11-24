<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCampusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('photourl1');
			$table->string('photourl2');
			$table->string('roomno');
			$table->string('floor');
			$table->string('building');

			$table->string('campus');
			$table->string('roomarea');

			$table->string('roomtype');
			$table->integer('seats');

			$table->string('facilities',1000);
			$table->string('condition',1000);
			$table->boolean('available');

			$table->boolean('active');
			

			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campus');
	}

}
