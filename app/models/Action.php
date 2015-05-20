<?php

class Action extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actions';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('name', 'description');

    public function roles() {
        return $this->belongsToMany("Role","actions_roles_menu", "role_id");
    }
    
    public function menus(){
        return $this->belongsToMany("AdministrationMenu", "actions_roles_menu", "menu_admin_id");
    }
    
}
