<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applied extends Model
{
    protected $table='applieds';

    protected $fillable=['id','offer_id','user_id','deleted'];

    public function offers(){
    	return $this->belongsTo(Offers::class, 'offer_id');
    }
}
