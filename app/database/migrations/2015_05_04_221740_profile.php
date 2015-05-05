<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profile extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('profiles', function($t) {
            $t->increments('id');
            $t->integer('user_id', false)->unsigned();
            $t->string('address1', 600);
            $t->string('address2', 600);
            $t->integer('zipcode', false);
            $t->string('country', 350);
            $t->string('departament', 350);
            $t->string('town', 350);
            $t->string('area', 350);
            $t->integer('phone_number', false);
            $t->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists("profiles");
    }

}
