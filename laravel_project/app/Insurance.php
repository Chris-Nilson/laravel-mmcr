<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function clients() {
        return $this->hasOne('App\Client', 'insurance_id');
        // return $this->hasMany('App\Client', 'insurance_id');
    }
            
    public function entreprises() {
        return $this->hasOne('App\Entreprise', 'insurance_id');
        // return $this->hasMany('App\Entreprise', 'insurance_id');
    }
            
    public function sales() {
        return $this->hasOne('App\Sale', 'insurance_id');
        // return $this->hasMany('App\Sale', 'insurance_id');
    }
            
}