<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceRange extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function smes() {
        return $this->hasOne('App\Sme', 'experience_range_id');
        // return $this->hasMany('App\Sme', 'experience_range_id');
    }
            
}