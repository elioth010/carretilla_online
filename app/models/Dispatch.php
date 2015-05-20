<?php

class Dispatch extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dispatchs';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('order_id', 'dispatch_date', 'status', 'user_dispatcher');

    public function user() {
        return $this->belongsTo('User', 'user_dispatchess');
    }

    public function order() {
        return $this->belongsTo('Order', 'order_id');
    }

}
