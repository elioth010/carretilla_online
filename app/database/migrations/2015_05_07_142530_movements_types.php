<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovementsTypes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('movements_type', function($t) {
            $t->increments('id');
            $t->string('name', 50);
            $t->string('description');
            $t->unique('name');
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
        Schmea::dropIfExists('movements_type');
    }

}
