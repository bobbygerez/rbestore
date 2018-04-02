<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    protected $table='roles';

    public function menu(){

    	return $this->belongsToMany('App\Menu', 'role_menu', 'menu_id', 'role_id');
    }
}
