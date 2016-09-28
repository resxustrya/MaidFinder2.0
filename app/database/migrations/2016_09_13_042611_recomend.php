<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recomend extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recomend', function($table){
			$table->increments('id');
			$table->integer('empid');
			$table->integer('emp_recomend');
			$table->integer('appid');
			$table->string('message',500);
			$table->boolean('accepted')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recomend');
	}

}
