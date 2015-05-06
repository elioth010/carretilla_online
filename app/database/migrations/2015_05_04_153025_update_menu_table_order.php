<?php
use Illuminate\Database\Migrations\Migration;

class UpdateMenuTableOrder extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('menus', function($table) {
            $table->integer('order', false);
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
