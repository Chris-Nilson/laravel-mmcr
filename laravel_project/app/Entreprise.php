<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $guarded = ['id'];

    protected $with = [insurance, ];

    
    public function insurance() {
        
        return $this->belongsTo('App\Insurance', 'insurance_id');
        // return $this->belongsToMany('App\Insurance', 'insurance_id');
    }
            
    public function clients() {
        return $this->hasOne('App\Client', 'entreprise_id');
        // return $this->hasMany('App\Client', 'entreprise_id');
    }
            
    public function sales() {
        return $this->hasOne('App\Sale', 'entreprise_id');
        // return $this->hasMany('App\Sale', 'entreprise_id');
    }
            
}