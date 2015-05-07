<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryMovements extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('inventory_movements', function($t) {
            $t->increments('id');
            $t->string('document_id', 20);
            $t->string('product_id', 10);
            $t->integer('order_id', false)->unsigned();
            $t->integer('user_id', false)->unsigned();
            $t->integer('movements_type', false)->unsigned();
            $t->integer('quantity', false)->unsigned();
            $t->foreign('product_id')->references('code')->on('products');
            $t->foreign('user_id')->references('id')->on('users');
            $t->foreign('order_id')->references('id')->on('orders');
            $t->foreign('movements_type')->references('id')->on('movements_type');
            $t->unique('document_id');
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
        Schema::dropIfExists('inventory_movements');
    }

}
