<?php

class AdministrationMenu extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administration_menus';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('name', 'description', 'image', 'title');

    public function roles() {
        return $this->belongsToMany("Role", "actions_roles_menu", "role_id");
    }

    public function actions() {
        return $this->belongsToMany("Action", "administration_menus", "action_id");
    }

}
