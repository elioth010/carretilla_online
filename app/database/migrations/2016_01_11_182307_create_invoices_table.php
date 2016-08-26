<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('invoices', function($t) {
            $t->increments('id');
            $t->integer('client_id', false)->unsigned();
            $t->integer('order_id', false)->unsigned();
            $t->integer('shop_id', false)->unsigned();
            $t->integer('user_id', false)->unsigned();
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
