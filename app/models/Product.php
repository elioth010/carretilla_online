<?php

class Product extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';
    
     protected $primaryKey = 'code';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('code', 'mark', 'name', 'price');

    public function mark() {
        return $this->hasOne('Mark', 'code', 'mark');
    }
    
    public function categories(){
        return $this->belongsToMany('Category', 'products_category');
    }
}
