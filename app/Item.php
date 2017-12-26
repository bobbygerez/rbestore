<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

	protected $table = 'items';
	protected $fillable = ['name', 'short_desc', 'long_desc'];

    public function images(){

    	return $this->morphMany('App\Image', 'imageable');
    }
}
