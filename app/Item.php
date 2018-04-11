<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{

	protected $table = 'items';
	protected $fillable = ['uuid', 'user_id', 'unit_id', 'category_id', 'subcategory_id', 'further_category_id',
                            'brgyCode', 'citymunCode', 'provCode', 'amount', 'discount', 'name', 'short_desc', 'long_desc'];


    public function images(){

    	return $this->morphMany('App\Image', 'imageable');
    }

    public function colors(){

        return $this->belongsToMany('App\Color', 'color_item', 'item_id', 'color_id');
    }

    public function sizes(){

        return $this->belongsToMany('App\Size', 'item_size', 'item_id', 'size_id');
    }

     public function getAmountAttribute($value){


        return number_format($value, 2, '.', ', ');
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

        return $this->hasOne('App\User', 'id', 'user_id')->select(['id', 'firstname', 'lastname', 'uuid', 'mobile']);
    }

    public function category(){

        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function subcategory(){
        return $this->hasOne('App\SubCategory', 'id', 'subcategory_id');
    }

    public function furtherCategory(){
        return $this->hasOne('App\FurtherCategory', 'id', 'further_category_id');
    }

    public function qty(){

        return $this->hasMany('App\Quantity', 'item_id', 'id');
    }



    //SCOPE

    public function scopeWithProduct($query){

        return $this->scopeWithOnly($query)->orderBy('created_at', 'DESC')->paginate(12);
    }

    public function scopeWithOnly($query){
        return $query->with(['images', 'province', 'userName', 'city', 'brgy', 'category', 'subcategory', 'furtherCategory', 'qty', 'colors.images', 'sizes']);
    }

    public function scopeOrdPag($query){

        return $query->orderBy('created_at', 'DESC')->paginate(12);
    }
}
