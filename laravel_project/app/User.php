<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function role() {
        
        return $this->belongsTo('App\Role', 'role_id');
        // return $this->belongsToMany('App\Role', 'role_id');
    }
            
    public function enterprise() {
        
        return $this->belongsTo('App\Enterprise', 'enterprise_id');
        // return $this->belongsToMany('App\Enterprise', 'enterprise_id');
    }
            
    public function bank() {
        
        return $this->belongsTo('App\Bank', 'bank_id');
        // return $this->belongsToMany('App\Bank', 'bank_id');
    }
            
}