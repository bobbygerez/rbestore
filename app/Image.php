<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
	protected $fillable = [ 'is_primary', 'body'];
    
    public function imageable(){

    	return $this->morphTo();
    }
}
