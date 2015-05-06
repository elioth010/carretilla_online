<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
		Schema::create('products', function{
			$t->increments('id');
            $t->string('code',10)->unsigned();
			$t->string('mark',3);
            $t->string('name', 600);
			$t->double('price',10,2);
			$t->primary('code');
            $t->unique('code');
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
