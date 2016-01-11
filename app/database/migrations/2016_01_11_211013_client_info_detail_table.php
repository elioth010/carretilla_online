<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientInfoDetailTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('invoices_details', function($t) {
            $t->increments('id');
            $t->foreign('product_id')->references('id')->on('products');
            $t->decimal('price',13,2);
            $t->decimal('tax',13,2);
            $t->integer('quantity')->unsigned();
            $t->decimal('sub_total',13,2);
            $t->decimal('off',13,2);
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
        Schema::dropIfExists('invoices_details');
    }

}
