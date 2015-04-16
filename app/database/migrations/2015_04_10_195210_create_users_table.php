<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users', function($t) {
                $t->increments('id');
                $t->string('username', 45);
                $t->string('password', 250);
                $t->string('email', 60);
                $t->string('name', 250);
                $t->integer('age', false);
                $t->rememberToken();
                $t->timestamps();
                $t->softDeletes();
		$t->unique('username');
            });	//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
