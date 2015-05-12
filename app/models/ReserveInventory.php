<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReserveInventory
 *
 * @author elioth010
 */
class ReserveInventory extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reserve_inventories';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('product_id', 'order_id', 'stocks');

    public function product() {
        return $this->hasOne('Product', 'product_id');
    }

    public function order() {
        return $this->hasOne('Order', 'order_id');
    }

}
