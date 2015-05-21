<?php

class OrderDetail extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders_details';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('order_id', 'product_id', 'quantity', 'sub_total');
    
    public function product(){
        return $this->hasOne('Product', 'code', 'product_id');
    }
    
    public function order(){
        return $this->hasOne('Order', 'id', 'order_id');
    }

}
