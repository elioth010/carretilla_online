<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DispatchTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
       Schema::create('dispatchs', function($t) {
            $t->increments('id');
            $t->integer('order_id', false)->unsigned();
            $t->dateTime('dispatch_date');
            $t->enum('status', array('IN_PROCESS','DISPATCHED'));
            $t->integer('user_dispatches', false)->unsigned();
            $t->foreign('order_id')->references('id')->on('orders');
            $t->foreign('user_dispatches')->references('id')->on('users');
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
        Schema::dropIfExists("dispatchs");
    }

}
