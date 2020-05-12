<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $guarded = ['id'];

    protected $with = [user, role, ];

    
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
    public function role() {
        
        return $this->belongsTo('App\Role', 'role_id');
        // return $this->belongsToMany('App\Role', 'role_id');
    }
            
}