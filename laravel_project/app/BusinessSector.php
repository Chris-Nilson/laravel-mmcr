<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessSector extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function smes() {
        return $this->hasOne('App\Sme', 'business_sector_id');
        // return $this->hasMany('App\Sme', 'business_sector_id');
    }
            
}