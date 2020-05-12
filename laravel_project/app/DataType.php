<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataType extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function data_rows() {
        return $this->hasOne('App\DataRow', 'data_type_id');
        // return $this->hasMany('App\DataRow', 'data_type_id');
    }
            
}