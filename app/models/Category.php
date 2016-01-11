<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('name');

}
