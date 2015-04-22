<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('menus_roles', function($t) {
                $t->integer('menu_id', false)->unsigned();
                $t->integer('role_id', false)->unsigned();
                $t->primary(array('menu_id','role_id'));
                $t->foreign('role_id')->references('id')->on('roles');
                $t->foreign('menu_id')->references('id')->on('menus');
                $t->timestamps();
                $t->softDeletes();
            });	//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('menu_role');
	}

}
