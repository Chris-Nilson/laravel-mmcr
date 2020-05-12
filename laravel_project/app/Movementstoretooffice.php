<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movementstoretooffice extends Model
{
    protected $guarded = ['id'];

    protected $with = [storekeeper, user, product, ];

    
    public function storekeeper() {
        // TODO change App\Storekeeper class to another existing class
		// TODO create the inverse relationship method in the correct model class
		// TODO add '_movementstoretooffices' in the eloquent of the correct class in its controller
		// TODO copy the code in comment to the correct class and change '_movementstoretooffices' function name
		/*
        public function _movementstoretooffices() {
            return $this->hasOne('App\Movementstoretooffice', 'storekeeper_id');
            // return $this->hasMany('App\Movementstoretooffice', 'storekeeper_id');
        }
        */
        return $this->belongsTo('App\Storekeeper', 'storekeeper_id');
        // return $this->belongsToMany('App\Storekeeper', 'storekeeper_id');
    }
            
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
    public function product() {
        
        return $this->belongsTo('App\Product', 'product_id');
        // return $this->belongsToMany('App\Product', 'product_id');
    }
            
}