<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    public function brgy(){

    	return $this->belongsToMany('App\Brgy', 'barangay_company', 'barangay_id', 'company_id');
    }

    public function branches(){

        return $this->hasMany('App\Branch', 'company_id', 'id');
    }

    public function user(){

        return $this->hasOne('App\User', 'id', 'user_id');
    }

     public function images(){

    	return $this->morphMany('App\Image', 'imageable');
    }



    //SCOPE
    //NEED TO UPDATE
    public function scopeUserPlace($query){

        return $query->orderBy('created_at', 'DESC')->paginate(12);
    }


}
