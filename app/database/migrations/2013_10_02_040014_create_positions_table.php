<?php

use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 // id
	    // code
	    // name
	    // num_winner
		Schema::create('positions', function($table)
		{
		    $table->engine = 'InnoDB';
		    
			$table->increments('id');
			$table->string('code', 45)->index()->unique();
			$table->integer('order');
			$table->string('name');
			$table->string('college_id');
			$table->integer('year');
			$table->smallInteger('num_winner');
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
		Schema::drop('positions');
	}

}