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

        return $this->hasOne('App\User', 'id', 'user_id')->select(['id', 'firstname', 'lastname', 'uuid', 'mobile']);
    }

    public function category(){

        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function subcategory(){
        return $this->hasOne('App\Subcategory', 'id', 'subcategory_id');
    }

    public function furtherCategory(){
        return $this->hasOne('App\FurtherCategory', 'id', 'further_category_id');
    }

    public function scopeWithProduct($query){

        return $query->with(['images', 'province', 'userName', 'city', 'brgy', 'category', 'subcategory', 'furtherCategory'])
                            ->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function scopeOrdPag($query){

        return $query->orderBy('created_at', 'DESC')->paginate(10);
    }
}
