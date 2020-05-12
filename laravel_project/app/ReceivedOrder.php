<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivedOrder extends Model
{
    protected $guarded = ['id'];

    protected $with = [emit_order, user, ];

    
    public function emit_order() {
        
        return $this->belongsTo('App\EmitOrder', 'emit_order_id');
        // return $this->belongsToMany('App\EmitOrder', 'emit_order_id');
    }
            
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
}