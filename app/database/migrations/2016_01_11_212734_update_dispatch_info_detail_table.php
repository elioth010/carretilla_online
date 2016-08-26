<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDispatchInfoDetailTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('dispatchs', function($t) {
            $t->integer('inventory_id', false)->unsigned();
            $t->foreign('inventory_id')->references('id')->on('inventories');
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
