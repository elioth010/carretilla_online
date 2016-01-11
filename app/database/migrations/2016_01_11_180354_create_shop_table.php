<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('shops', function($t) {
            $t->increments('id');
            $t->string('name', 350);
            $t->string('address', 500);
            $t->string('phone', 20);
            $t->string('image', 600);
            $t->unique(array('id', 'name'));
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
        Schemma::dropIfExists('shops');
    }

}
