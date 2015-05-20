<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsCategoryMigration extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('products_category', function($t) {
            $t->string('product_id', 10);
            $t->integer('category_id', false)->unsigned();
            $t->primary(array('product_id', 'category_id'));
            $t->foreign('product_id')->references('code')->on('products');
            $t->foreign('category_id')->references('id')->on('category');
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
        Schema::dropIfExists("products_category");
    }

}
