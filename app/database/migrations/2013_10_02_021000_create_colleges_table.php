<?php

use Illuminate\Database\Migrations\Migration;

class CreateCollegesTable extends Migration {

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
		Schema::create('colleges', function($table)
		{
		    $table->engine = 'InnoDB';
		    
			$table->increments('id');
			$table->string('code', 45)->index()->unique();
			$table->string('name');

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
		Schema::drop('colleges');
	}

}