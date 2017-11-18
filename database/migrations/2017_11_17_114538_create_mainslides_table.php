<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainslidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mainslides', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('photourl1');
			$table->string('photourl2');
				$table->string('title');
			$table->string('stitle');
			
			$table->string('description', 5000);
			
			$table->integer('slideno');
			$table->boolean('active');
			

			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

			
			// $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mainslides');
	}

}
