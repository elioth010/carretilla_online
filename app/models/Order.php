<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Order extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('user_id', 'date', 'total');
    
    public function user(){
        return $this->hasOne('User', 'id', 'user_id');
    }
    
    public function dispatch(){
        return $this->belongsTo('Dispatch');
    }
    
    public function detail(){
        return $this->hasMany('OrderDetail');
    }

}
