<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Oders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('orders', function{
			$t->increments('id');
            $t->integer('user_id', false)->unsigned();
			$table->dateTime('date');
			$table->foreign('user_id')->references('id')->on('users');
            $t->timestamps();
            $t->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::dropIfExists("orders");
	}

}
