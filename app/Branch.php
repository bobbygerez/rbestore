<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    
    public function province(){

    	return $this->hasOne('App\Province', 'id', 'province_id');
    }

    public function city(){

    	return $this->hasOne('App\City', 'id', 'city_id');
    }

    public function brgy(){

    	return $this->hasOne('App\Brgy', 'id', 'brgy_id');
    }

    public function items(){

    	return $this->belongsToMany('App\Item', 'branch_item', 'branch_id', 'item_id');
    }

    public function company(){

        return $this->belongsTo('App\Company', 'company_id', 'id');
    }



    //SCOPES
    public function scopeWithRel($query){

        return $query->with(['items.images', 'items.qty', 'items.colors.images', 'items.sizes', 'province', 'city', 'brgy']);
    }
}
