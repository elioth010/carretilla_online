<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users_roles', function($t) {
                $t->integer('user_id', false)->unsigned();
                $t->integer('role_id', false)->unsigned();
                $t->primary(array('user_id','role_id'));
                $t->foreign('role_id')->references('id')->on('roles');
                $t->foreign('user_id')->references('id')->on('users');
                $t->timestamps();
                $t->softDeletes();
            });	 //
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('user_role');
	}

}
