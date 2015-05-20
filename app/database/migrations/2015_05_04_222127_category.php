<?php
class CategoryMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('category', function($t) {
            $t->increments('id');
            $t->string('name', 600);
            $t->unique('id');
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
        Schema::dropIfExists("category");
    }
}