<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $guarded = ['id'];

    protected $with = [permission, role, ];

    
    public function permission() {
        
        return $this->belongsTo('App\Permission', 'permission_id');
        // return $this->belongsToMany('App\Permission', 'permission_id');
    }
            
    public function role() {
        
        return $this->belongsTo('App\Role', 'role_id');
        // return $this->belongsToMany('App\Role', 'role_id');
    }
            
}