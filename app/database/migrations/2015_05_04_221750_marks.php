<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Marks extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('marks', function($t) {
            $t->increments('id');
            $t->string('code', 3);
            $t->string('name', 600);
            $t->string('product_range_initial', 10);
            $t->integer('product_range_final', 10);
            $t->unique('code');
            $t->timestamps();
            $t->softDeletes();
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists("marks");
    }

}
