<?php

//use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	/*
		CREATE  TABLE user (
  username VARCHAR(45) NOT NULL ,
  password VARCHAR(32) NOT NULL ,
  email VARCHAR(60) NOT NULL,
  name VARCHAR(250) NOT NULL,
  age INT(3) NOT NULL,
  enabled TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (username));
	*/

	public function up()
	{
		Schema::create('users', function($table)
        {
            $table->increments('id')->key();
            $table->string('username', 45)->unique();
            $table->string('password', 32);
            $table->string('email', 60);
            $table->string('name', 250);
            $table->integer('age', 3);
            $table->integer('enabled', 1);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
