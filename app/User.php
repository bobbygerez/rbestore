<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'company', 'jobtitle', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $columns = array('firstname','lastname', 'mobile', 'jobtitle','company','email');

    public function scopeExclude($query,$value = array()) 
    {
        return $query->select( array_diff( $this->columns,(array) $value) );
    }
}
