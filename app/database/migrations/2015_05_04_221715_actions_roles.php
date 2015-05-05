<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActionsRoles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('actions_roles', function($t) {
            $t->integer('action_id', false)->unsigned();
            $t->integer('role_id', false)->unsigned();
            $t->primary(array('action_id', 'role_id'));
            $t->foreign('role_id')->references('id')->on('roles');
            $t->foreign('action_id')->references('id')->on('actions');
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
        Schema::dropIfExists("actions_roles");
    }

}
