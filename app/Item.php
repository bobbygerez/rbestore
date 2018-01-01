<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{

	protected $table = 'items';
	protected $fillable = ['name', 'short_desc', 'long_desc'];


    public function images(){

    	return $this->morphMany('App\Image', 'imageable');
    }

     public function getAmountAttribute($value){


        return "Php " . number_format($value, 2, '.', ',');
    }

    public function getCreatedAtAttribute($value){
        return  Carbon::parse($value)->diffForHumans();
        
    }

    public function province(){

        return $this->hasOne('App\Province', 'provCode', 'provCode');

    }

    public function city(){

        return $this->hasOne('App\City', 'citymunCode', 'citymunCode');
    }

    public function brgy(){
         return $this->hasOne('App\Brgy', 'brgyCode', 'brgyCode');
    }

    public function userName(){

        return $this->hasOne('App\User', 'id', 'user_id')->select(['id', 'firstname', 'lastname', 'uuid']);
    }
}
