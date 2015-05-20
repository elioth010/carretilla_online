<?php

class ActionMenuRole extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actions_roles_menu';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('role_id', 'menu_admin_id', 'action_id');
    
}
