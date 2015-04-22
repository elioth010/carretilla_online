<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('roles', function($t) {
                $t->increments('id');
                $t->string('name', 45);
                $t->string('description', 250);
                $t->timestamps();
                $t->softDeletes();
		$t->unique('name');
            });	//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('roles');
	}

}
