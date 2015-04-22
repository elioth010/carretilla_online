<?php

use Illuminate\Database\Migrations\Migration;

class UpdateMenuTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('menus', function($table) {
            $table->string('route');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
       Schema::dropIfExists('menus');
    }

}
