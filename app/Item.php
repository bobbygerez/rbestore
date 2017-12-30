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



    }
}
