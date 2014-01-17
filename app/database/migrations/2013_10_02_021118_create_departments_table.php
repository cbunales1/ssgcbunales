<?php

use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration {

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
		Schema::create('departments', function($table)
		{
		    $table->engine = 'InnoDB';
		    
			$table->increments('id');
			$table->string('code', 45)->index()->unique();
			$table->string('name');
			$table->string('college');
			$table->integer('year');

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
	    Schema::drop('departments');
	}

}