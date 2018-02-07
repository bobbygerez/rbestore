<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    
    public function province(){

    	return $this->hasOne('App\Province', 'id', 'province_id');
    }

    public function city(){

    	return $this->hasOne('App\City', 'id', 'city_id');
    }

    public function brgy(){

    	return $this->hasOne('App\Brgy', 'id', 'brgy_id');
    }
}
