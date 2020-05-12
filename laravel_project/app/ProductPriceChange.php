<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPriceChange extends Model
{
    protected $guarded = ['id'];

    protected $with = [user, product, ];

    
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
    public function product() {
        
        return $this->belongsTo('App\Product', 'product_id');
        // return $this->belongsToMany('App\Product', 'product_id');
    }
            
}