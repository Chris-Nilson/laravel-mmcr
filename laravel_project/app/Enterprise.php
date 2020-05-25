<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function partners() {
        return $this->hasOne('App\Partner', 'enterprise_id');
        // return $this->hasMany('App\Partner', 'enterprise_id');
    }
            
    public function smes() {
        return $this->hasOne('App\Sme', 'enterprise_id');
        // return $this->hasMany('App\Sme', 'enterprise_id');
    }
            
    public function users() {
        return $this->hasOne('App\User', 'enterprise_id');
        // return $this->hasMany('App\User', 'enterprise_id');
    }
            
}