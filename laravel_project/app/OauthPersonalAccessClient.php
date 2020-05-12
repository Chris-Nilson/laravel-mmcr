<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthPersonalAccessClient extends Model
{
    protected $guarded = ['id'];

    protected $with = [client, ];

    
    public function client() {
        
        return $this->belongsTo('App\Client', 'client_id');
        // return $this->belongsToMany('App\Client', 'client_id');
    }
            
}