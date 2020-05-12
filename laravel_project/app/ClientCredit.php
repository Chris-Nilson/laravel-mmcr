<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCredit extends Model
{
    protected $guarded = ['id'];

    protected $with = [client, user, ];

    
    public function client() {
        
        return $this->belongsTo('App\Client', 'client_id');
        // return $this->belongsToMany('App\Client', 'client_id');
    }
            
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
}