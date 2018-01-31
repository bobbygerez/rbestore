<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    public function brgy(){

    	return $this->belongsToMany('App\Brgy', 'barangay_company', 'barangay_id', 'company_id');
    }
}
