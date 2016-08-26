<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopUsersAssigmentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users_shops', function($t) {
            $t->increments('id');
            $t->integer('user_id', false)->unsigned();
            $t->integer('shop_id', false)->unsigned();
            $t->foreign('user_id')->references('id')->on('users');
            $t->foreign('shop_id')->references('id')->on('shops');
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
        Schema::dropIfExists('users_shops');
    }

}
