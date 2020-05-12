<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    protected $guarded = ['id'];

    protected $with = [user, ];

    
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
}