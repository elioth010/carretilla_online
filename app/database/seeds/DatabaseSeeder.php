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
                //$this->call('RoleTableSeeder');
                //$this->call('MenuTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('users')->delete();
        //User::create(['username' => 'master', 'password'=>Hash::make('online15'), 'email' => 'klank4135@gmail.com', 'name' => 'Alexander Morales', 'age' => 30]);
        $user = User::where('username','=','master')->firstOrFail();
        $master = Role::where('name','=','master')->firstOrFail();
        $user->roles()->attach($master->id);
    }

}

class RoleTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('users')->delete();
        Role::create(['name' => 'guest', 'description'=> 'Provide a basic navigation']);
        Role::create(['name' => 'admin', 'description'=> 'Provide an administration option']);
        Role::create(['name' => 'user', 'description'=> 'Provide a complex user navigation']);
        Role::create(['name' => 'master', 'description'=> 'Provide a complete acccess to navigations levels']);
    }
}

class MenuTableSeeder extends Seeder{
    public function run(){
        $admin = Role::where('name','=','admin')->firstOrFail();
        $guest = Role::where('name','=','guest')->firstOrFail();
        $user = Role::where('name','=','user')->firstOrFail();
        $master = Role::where('name','=','master')->firstOrFail();
        
        Menu::create(['name'=>'home', 'description' =>'show the principal page', 'image'=>'', 'title'=>'Home', 'route'=>'/']);
        Menu::create(['name'=>'profile', 'description' =>'provide a page to change the user profile', 'image'=>'', 'title'=>'Profile', 'route'=>'profile']);
        Menu::create(['name'=>'login', 'description' =>'provide a page to make a login or sign up', 'image'=>'', 'title'=>'Login', 'route'=>'login']);
        Menu::create(['name'=>'logout', 'description' =>'make a logout if a user is login', 'image'=>'', 'title'=>'Logout', 'route'=>'logout']);
        
        $login = Menu::where('name','=','login')->firstOrFail();
        $profile = Menu::where('name','=','profile')->firstOrFail();
        $home = Menu::where('name','=','home')->firstOrFail();
        $logout = Menu::where('name','=','logout')->firstOrFail();
        
        $login->roles()->attach($guest->id);
        $profile->roles()->sync(array($admin->id, $user->id, $master->id));
        $home->roles()->sync(array($guest->id,$admin->id, $user->id, $master->id));
        $logout->roles()->sync(array($admin->id, $user->id, $master->id));
    }
}

