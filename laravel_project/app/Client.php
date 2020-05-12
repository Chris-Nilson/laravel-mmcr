<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id'];

    protected $with = [insurance, entreprise, ];

    
    public function insurance() {
        
        return $this->belongsTo('App\Insurance', 'insurance_id');
        // return $this->belongsToMany('App\Insurance', 'insurance_id');
    }
            
    public function entreprise() {
        
        return $this->belongsTo('App\Entreprise', 'entreprise_id');
        // return $this->belongsToMany('App\Entreprise', 'entreprise_id');
    }
            
    public function buckets() {
        return $this->hasOne('App\Bucket', 'client_id');
        // return $this->hasMany('App\Bucket', 'client_id');
    }
            
    public function client_accounts() {
        return $this->hasOne('App\ClientAccount', 'client_id');
        // return $this->hasMany('App\ClientAccount', 'client_id');
    }
            
    public function client_credits() {
        return $this->hasOne('App\ClientCredit', 'client_id');
        // return $this->hasMany('App\ClientCredit', 'client_id');
    }
            
    public function oauth_access_tokens() {
        return $this->hasOne('App\OauthAccessToken', 'client_id');
        // return $this->hasMany('App\OauthAccessToken', 'client_id');
    }
            
    public function oauth_auth_codes() {
        return $this->hasOne('App\OauthAuthCode', 'client_id');
        // return $this->hasMany('App\OauthAuthCode', 'client_id');
    }
            
    public function oauth_personal_access_clients() {
        return $this->hasOne('App\OauthPersonalAccessClient', 'client_id');
        // return $this->hasMany('App\OauthPersonalAccessClient', 'client_id');
    }
            
    public function sales() {
        return $this->hasOne('App\Sale', 'client_id');
        // return $this->hasMany('App\Sale', 'client_id');
    }
            
}