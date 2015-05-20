<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsMigration extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('products', function($t) {
            $t->string('code', 10);
            $t->string('mark', 3);
            $t->string('name', 600);
            $t->decimal('price', 10, 2);
            $t->string('image', 500);
            $t->primary('code');
            $t->foreign('mark')->references('code')->on('marks');
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
        Schema::dropIfExists("products");
    }

}
