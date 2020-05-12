<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmitOrder extends Model
{
    protected $guarded = ['id'];

    protected $with = [supplier, user, ];

    
    public function supplier() {
        
        return $this->belongsTo('App\Supplier', 'supplier_id');
        // return $this->belongsToMany('App\Supplier', 'supplier_id');
    }
            
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
    public function received_orders() {
        return $this->hasOne('App\ReceivedOrder', 'emit_order_id');
        // return $this->hasMany('App\ReceivedOrder', 'emit_order_id');
    }
            
}