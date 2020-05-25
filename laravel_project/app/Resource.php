<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function activity_resources() {
        return $this->hasOne('App\ActivityResource', 'resource_id');
        // return $this->hasMany('App\ActivityResource', 'resource_id');
    }
            
}