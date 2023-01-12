<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table='offers';

    public function applied(){
    	return $this->hasMany(Applied::class, 'offer_id');
    }
}
