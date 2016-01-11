<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author elioth010
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Menu extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');
    /**
     *
     * @var type The fillable property specifies which attributes should be mass-assignable. This can be set at the class or instance level.
     */
    protected $fillable = array('name', 'description');

    public function roles() {
        return $this->belongsToMany('Role', 'menus_roles');
    }

}
