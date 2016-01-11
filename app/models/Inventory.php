<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Inventory extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inventories';
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('product_id', 'stock');

    public function product() {
        return $this->hasOne('Product', 'product_id');
    }

}
