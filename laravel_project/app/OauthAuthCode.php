<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthAuthCode extends Model
{
    protected $guarded = ['id'];

    protected $with = [user, client, ];

    
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
    public function client() {
        
        return $this->belongsTo('App\Client', 'client_id');
        // return $this->belongsToMany('App\Client', 'client_id');
    }
            
}