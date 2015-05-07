<?php

use Illuminate\Database\Migrations\Migration;

class Oders extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('orders', function($t) {
            $t->increments('id');
            $t->integer('user_id', false)->unsigned();
            $t->dateTime('date');
            $t->decimal('total', 10, 2);
            $t->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists("orders");
    }

}
