<?php

use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('candidates', function($table)
		{
		    $table->engine = 'InnoDB';
		    
		    $table->increments('id');
		    $table->string('lastname');  
		    $table->string('firstname');
		    $table->string('middlename');
		    $table->string('position_id');
		    $table->string('partylist');
		    
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
		Schema::drop('candidates');
	}

}