<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    public function items(){

    	return $this->belongsToMany('App\Item', 'color_item', 'item_id', 'color_id');
    }

    public function images(){

    	return $this->morphMany('App\Image', 'imageable');
    }
}
