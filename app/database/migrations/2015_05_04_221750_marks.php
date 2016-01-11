<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarks extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('marks', function($t) {
            $t->string('code', 3);
            $t->string('name', 600);
            $t->string('product_range_initial', 10);
            $t->string('product_range_final', 10);
            $t->primary('code');
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
