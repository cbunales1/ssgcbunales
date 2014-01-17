<?php

use Illuminate\Database\Migrations\Migration;

class CreateVotersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voters', function($table)
		{
			$table->engine = 'InnoDB';
		    
			$table->increments('id');
			$table->string('code', 45)->index()->unique();
			$table->string('lastname');
			$table->string('firstname');
			$table->string('middlename');
			$table->string('generatedpassword');
			$table->string('year');
			$table->string('college');
			$table->boolean('active')->default(0);
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
		Schema::drop('voters');
	}

}