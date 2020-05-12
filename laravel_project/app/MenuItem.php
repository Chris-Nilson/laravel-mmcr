<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $guarded = ['id'];

    protected $with = [menu, parent, ];

    
    public function menu() {
        
        return $this->belongsTo('App\Menu', 'menu_id');
        // return $this->belongsToMany('App\Menu', 'menu_id');
    }
            
    public function parent() {
        // TODO change App\Parent class to another existing class
		// TODO create the inverse relationship method in the correct model class
		// TODO add '_menu_items' in the eloquent of the correct class in its controller
		// TODO copy the code in comment to the correct class and change '_menu_items' function name
		/*
        public function _menu_items() {
            return $this->hasOne('App\MenuItem', 'parent_id');
            // return $this->hasMany('App\MenuItem', 'parent_id');
        }
        */
        return $this->belongsTo('App\Parent', 'parent_id');
        // return $this->belongsToMany('App\Parent', 'parent_id');
    }
            
}