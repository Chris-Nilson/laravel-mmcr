<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $with = [category, ];

    
    public function category() {
        // TODO change App\Category class to another existing class
		// TODO create the inverse relationship method in the correct model class
		// TODO add '_products' in the eloquent of the correct class in its controller
		// TODO copy the code in comment to the correct class and change '_products' function name
		/*
        public function _products() {
            return $this->hasOne('App\Product', 'category_id');
            // return $this->hasMany('App\Product', 'category_id');
        }
        */
        return $this->belongsTo('App\Category', 'category_id');
        // return $this->belongsToMany('App\Category', 'category_id');
    }
            
    public function movementstoreofficedecomposeds() {
        return $this->hasOne('App\Movementstoreofficedecomposed', 'product_id');
        // return $this->hasMany('App\Movementstoreofficedecomposed', 'product_id');
    }
            
    public function movementstoreperimes() {
        return $this->hasOne('App\Movementstoreperime', 'product_id');
        // return $this->hasMany('App\Movementstoreperime', 'product_id');
    }
            
    public function movementstoretooffices() {
        return $this->hasOne('App\Movementstoretooffice', 'product_id');
        // return $this->hasMany('App\Movementstoretooffice', 'product_id');
    }
            
    public function product_price_changes() {
        return $this->hasOne('App\ProductPriceChange', 'product_id');
        // return $this->hasMany('App\ProductPriceChange', 'product_id');
    }
            
    public function stock_officine_decomposes() {
        return $this->hasOne('App\StockOfficineDecompose', 'product_id');
        // return $this->hasMany('App\StockOfficineDecompose', 'product_id');
    }
            
    public function stock_officines() {
        return $this->hasOne('App\StockOfficine', 'product_id');
        // return $this->hasMany('App\StockOfficine', 'product_id');
    }
            
    public function stock_perimes() {
        return $this->hasOne('App\StockPerime', 'product_id');
        // return $this->hasMany('App\StockPerime', 'product_id');
    }
            
    public function stock_warehouses() {
        return $this->hasOne('App\StockWarehouse', 'product_id');
        // return $this->hasMany('App\StockWarehouse', 'product_id');
    }
            
}