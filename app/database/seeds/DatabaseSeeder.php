<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('users')->delete();
        User::create(['username' => 'master', 'password'=>Hash::make('online15'), 'email' => 'klank4135@gmail.com', 'name' => 'Alexander Morales', 'age' => 30]);
    }

}

