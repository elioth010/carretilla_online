<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

//	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
<<<<<<< HEAD
	protected $table = 'users';
	protected $fillable = array('username', 'email', 'password', 'age', 'name');
=======
	protected $table = 'user';
>>>>>>> origin/amorales

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
        
        public function getAuthIdentifier() {
            return $this->username;
        }

        public function getAuthPassword() {
            return $this->password;
        }
        
        public function getRememberToken() {
            return null;
        }
        
        public function getRememberTokenName() {
            return null;
        }

        public function setRememberToken($value) {
            
        }
        
        public function getReminderEmail() {
           return $this->email;
        }
}
