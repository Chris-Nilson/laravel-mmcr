<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function enterprise() {
        
        return $this->belongsTo('App\Enterprise', 'enterprise_id');
        // return $this->belongsToMany('App\Enterprise', 'enterprise_id');
    }
            
}