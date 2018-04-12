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

    public function items(){

    	return $this->hasMany('App\Item', 'subcategory_id', 'id');
    }


    public function scopePaginate($query){

        return $this->scopeWithOnly($query)->orderBy('created_at', 'DESC')->paginate(12);
    }

    public function scopeWithOnly($query){
        return $query->with(['images', 'province', 'userName', 'city', 'brgy', 'category', 'subcategory', 'furtherCategory', 'qty', 'colors.images', 'sizes']);
    }
}
