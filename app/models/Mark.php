<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Mark extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'marks';
        protected $primaryKey = 'code';
        
        use SoftDeletingTrait;

        protected $dates = ['deleted_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        protected $fillable = array('code', 'name', 'product_range_initial', 'product_range_final');

}