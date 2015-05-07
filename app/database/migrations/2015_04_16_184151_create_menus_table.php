<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('menus', function($t) {
                $t->increments('id');
                $t->string('name', 45);
                $t->string('description', 250);
                $t->string('image', 500);
                $t->string('title', 250);
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
            Schema::drop('menus');
	}

}
