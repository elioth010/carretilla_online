<?php

class Order extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('user_id', 'date', 'total');
    
    public function user(){
        return $this->hasOne('User', 'user_id');
    }

}
