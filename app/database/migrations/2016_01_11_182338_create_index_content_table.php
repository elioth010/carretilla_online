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
            $t->integer('position_id', false)->unsigned();
            $t->string('product_id');
            $t->foreign('position_id')->references('id')->on('positions_page');
            $t->foreign('product_id')->references('code')->on('products');
            $t->string('image',500);
            $t->string('header_text',150);
            $t->string('description',500);
            $t->integer('order')->unsigned();
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
