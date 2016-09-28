<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hirelist extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hirelist', function($table) {
			$table->increments('id');
			$table->integer('empid');
			$table->integer('appid');
			$table->string('message', 500)->nullable();
			$table->boolean('status')->nullable()->default(0);
			$table->boolean('accepted')->nullable()->default(0);
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
		Schema::drop('hirelist');
	}

}
