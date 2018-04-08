<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['name', 'desc'];

    public function furtherCategory(){

    	return $this->hasMany('App\FurtherCategory', 'subcategory_id', 'id');
    }
}
