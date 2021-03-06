<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserModuleAcionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('admin_module_user_actions', function($t) {
            $t->increments('id');
            $t->integer('order_id', false)->unsigned();
            $t->integer('user_id', false)->unsigned();
            $t->integer('shop_id', false)->unsigned();
            $t->integer('menu_id', false)->unsigned();
            $t->integer('action_id', false)->unsigned();
            $t->foreign('user_id')->references('id')->on('users');
            $t->foreign('shop_id')->references('id')->on('shops');
            $t->foreign('menu_id')->references('id')->on('menus');
            $t->foreign('action_id')->references('id')->on('actions');
            $t->timestamps();
            $t->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
