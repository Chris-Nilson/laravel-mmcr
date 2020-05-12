<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function emit_orders() {
        return $this->hasOne('App\EmitOrder', 'supplier_id');
        // return $this->hasMany('App\EmitOrder', 'supplier_id');
    }
            
}