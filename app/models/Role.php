<?php

class Role extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    public function actions() {
        return $this->belongsToMany("Action", "actions_roles_menu", "role_id","action_id");
    }

}
