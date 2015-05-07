<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminMenusRoles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('administration_menus_roles', function($t) {
            $t->integer('admin_menu_id', false)->unsigned();
            $t->integer('role_id', false)->unsigned();
            $t->primary(array('admin_menu_id', 'role_id'));
            $t->foreign('role_id')->references('id')->on('roles');
            $t->foreign('admin_menu_id')->references('id')->on('administration_menus');
            $t->timestamps();
            $t->softDeletes();
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('administration_menus_roles');
    }

}
