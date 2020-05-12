<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthRefreshToken extends Model
{
    protected $guarded = ['id'];

    protected $with = [access_token, ];

    
    public function access_token() {
        // TODO change App\AccessToken class to another existing class
		// TODO create the inverse relationship method in the correct model class
		// TODO add '_oauth_refresh_tokens' in the eloquent of the correct class in its controller
		// TODO copy the code in comment to the correct class and change '_oauth_refresh_tokens' function name
		/*
        public function _oauth_refresh_tokens() {
            return $this->hasOne('App\OauthRefreshToken', 'access_token_id');
            // return $this->hasMany('App\OauthRefreshToken', 'access_token_id');
        }
        */
        return $this->belongsTo('App\AccessToken', 'access_token_id');
        // return $this->belongsToMany('App\AccessToken', 'access_token_id');
    }
            
}