<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function permission_role() {
        return $this->hasOne('App\PermissionRole', 'role_id');
        // return $this->hasMany('App\PermissionRole', 'role_id');
    }
            
    public function user_roles() {
        return $this->hasOne('App\UserRole', 'role_id');
        // return $this->hasMany('App\UserRole', 'role_id');
    }
            
    public function users() {
        return $this->hasOne('App\User', 'role_id');
        // return $this->hasMany('App\User', 'role_id');
    }
            
}