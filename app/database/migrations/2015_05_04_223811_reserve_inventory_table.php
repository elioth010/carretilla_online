<?php

use Illuminate\Database\Migrations\Migration;

class ReserveInventoryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('reserve_inventories', function($t) {
            $t->increments('id');
            $t->string('product_id', 10);
            $t->integer('order_id', false)->unsigned();
            $t->integer('stocks', false)->unsigned();
            $t->foreign('product_id')->references('code')->on('products');
            $t->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists("reserve_inventories");
    }

}
