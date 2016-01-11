<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexContentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('index_page', function($t) {
            $t->increments('id');
            $t->foreign('client_id')->references('id')->on('users');
            $t->foreign('order_id')->references('id')->on('orders');
            $t->foreign('shop_id')->references('id')->on('shops');
            $t->foreign('user_id')->references('id')->on('users');
            $t->decimal('amount',13,2);
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
