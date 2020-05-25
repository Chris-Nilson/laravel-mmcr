<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function users() {
        return $this->hasOne('App\User', 'bank_id');
        // return $this->hasMany('App\User', 'bank_id');
    }
            
}