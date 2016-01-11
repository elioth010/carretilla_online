<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActions extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('actions', function($t) {
            $t->increments('id');
            $t->string('name', 45);
            $t->string('description', 250);
            $t->timestamps();
            $t->softDeletes();
            $t->unique('name');
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists("actions");
    }

}
