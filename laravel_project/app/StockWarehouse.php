<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockWarehouse extends Model
{
    protected $guarded = ['id'];

    protected $with = [product, ];

    
    public function product() {
        
        return $this->belongsTo('App\Product', 'product_id');
        // return $this->belongsToMany('App\Product', 'product_id');
    }
            
}