<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    // public function foo() {
    //     // return $this->belongsTo('App\bar');
    //     // return $this->belongsToMany('App\bar');
    //     // return $this->hasOne('App\bar');
    //     // return $this->hasMany('App\bar');
    // }
            
}