<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Profile extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('user_id', 'address1', 'address2', 'zipcode', 'country', 'departament', 'town', 'area', 'phone_number');

    public function user(){
        $this->belongsTo('User', 'user_id');
    }
}
