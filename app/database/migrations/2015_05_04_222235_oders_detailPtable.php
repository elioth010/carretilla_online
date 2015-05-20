<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OdersDetailMigration extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders_details', function($t) {
            $t->increments('id');
            $t->integer('order_id', false)->unsigned();
            $t->string('product_id',10);
            $t->integer('quantity', false)->unsigned();
            $t->decimal('sub_total', 10, 2);
            $t->foreign('order_id')->references('id')->on('orders');
            $t->foreign('product_id')->references('code')->on('products');
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
        Schema::dropIfExists('orders_details');
    }

}
