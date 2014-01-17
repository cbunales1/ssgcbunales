<?php

use Illuminate\Database\Migrations\Migration;

class CreateCastvotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('castvotes', function($table)
		{
		     $table->engine = 'InnoDB';
		     
		     $table->increments('id');
		     $table->int('position_id');
		     $table->int('candidate_id');
		     
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
		Schema::drop('castvotes');
	}

}