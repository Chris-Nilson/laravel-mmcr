<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function permission_role() {
        return $this->hasOne('App\PermissionRole', 'permission_id');
        // return $this->hasMany('App\PermissionRole', 'permission_id');
    }
            
}