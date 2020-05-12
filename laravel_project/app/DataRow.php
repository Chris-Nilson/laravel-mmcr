<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataRow extends Model
{
    protected $guarded = ['id'];

    protected $with = [data_type, ];

    
    public function data_type() {
        
        return $this->belongsTo('App\DataType', 'data_type_id');
        // return $this->belongsToMany('App\DataType', 'data_type_id');
    }
            
}