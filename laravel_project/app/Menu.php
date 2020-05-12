<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function menu_items() {
        return $this->hasOne('App\MenuItem', 'menu_id');
        // return $this->hasMany('App\MenuItem', 'menu_id');
    }
            
}