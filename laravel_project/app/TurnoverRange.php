<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurnoverRange extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function smes() {
        return $this->hasOne('App\Sme', 'turnover_range_id');
        // return $this->hasMany('App\Sme', 'turnover_range_id');
    }
            
}