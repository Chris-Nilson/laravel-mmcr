<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function users() {
        return $this->hasOne('App\User', 'role_id');
        // return $this->hasMany('App\User', 'role_id');
    }
            
}