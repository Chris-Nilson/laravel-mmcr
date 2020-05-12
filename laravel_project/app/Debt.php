<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $guarded = ['id'];

    protected $with = [sale, ];

    
    public function sale() {
        
        return $this->belongsTo('App\Sale', 'sale_id');
        // return $this->belongsToMany('App\Sale', 'sale_id');
    }
            
}