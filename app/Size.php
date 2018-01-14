<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    
    protected $table = 'sizes';

    public function item(){

    	return $this->belongsToMany('App\Size', 'item_size', 'item_id', 'size_id');
    }
}
