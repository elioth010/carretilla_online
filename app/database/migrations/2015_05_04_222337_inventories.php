<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inventories extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('inventories', function($t) {
            $t->increments('id');
            $t->string('product_id', 10);
            $t->integer('stocks', false)->unsigned();
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
        Schema::dropIfExists("inventories");
    }

}
