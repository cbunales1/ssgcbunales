<?php

use Illuminate\Database\Migrations\Migration;

class MergeUsersVoters extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) {
		   $table->string('year'); 
		   $table->string('middlename');
		   $table->string('generatedpassword');
		   $table->string('college');
		   $table->boolean('active')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table) {
		   $table->dropColumn('year'); 
		   $table->dropColumn('middlename');
		   $table->dropColumn('generatedpassword'); 
		   $table->dropColumn('college'); 
		   $table->dropColumn('active')->default(0);
		});
	}

}