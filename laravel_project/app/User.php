<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ['id'];

    protected $with = [role, ];

    
    public function role() {
        
        return $this->belongsTo('App\Role', 'role_id');
        // return $this->belongsToMany('App\Role', 'role_id');
    }
            
    public function buckets() {
        return $this->hasOne('App\Bucket', 'user_id');
        // return $this->hasMany('App\Bucket', 'user_id');
    }
            
    public function client_credits() {
        return $this->hasOne('App\ClientCredit', 'user_id');
        // return $this->hasMany('App\ClientCredit', 'user_id');
    }
            
    public function emit_orders() {
        return $this->hasOne('App\EmitOrder', 'user_id');
        // return $this->hasMany('App\EmitOrder', 'user_id');
    }
            
    public function finance_caisses() {
        return $this->hasOne('App\FinanceCaisse', 'user_id');
        // return $this->hasMany('App\FinanceCaisse', 'user_id');
    }
            
    public function inventories() {
        return $this->hasOne('App\Inventorie', 'user_id');
        // return $this->hasMany('App\Inventorie', 'user_id');
    }
            
    public function movementstoreofficedecomposeds() {
        return $this->hasOne('App\Movementstoreofficedecomposed', 'user_id');
        // return $this->hasMany('App\Movementstoreofficedecomposed', 'user_id');
    }
            
    public function movementstoreperimes() {
        return $this->hasOne('App\Movementstoreperime', 'user_id');
        // return $this->hasMany('App\Movementstoreperime', 'user_id');
    }
            
    public function movementstoretooffices() {
        return $this->hasOne('App\Movementstoretooffice', 'user_id');
        // return $this->hasMany('App\Movementstoretooffice', 'user_id');
    }
            
    public function oauth_access_tokens() {
        return $this->hasOne('App\OauthAccessToken', 'user_id');
        // return $this->hasMany('App\OauthAccessToken', 'user_id');
    }
            
    public function oauth_auth_codes() {
        return $this->hasOne('App\OauthAuthCode', 'user_id');
        // return $this->hasMany('App\OauthAuthCode', 'user_id');
    }
            
    public function oauth_clients() {
        return $this->hasOne('App\OauthClient', 'user_id');
        // return $this->hasMany('App\OauthClient', 'user_id');
    }
            
    public function plan_orders() {
        return $this->hasOne('App\PlanOrder', 'user_id');
        // return $this->hasMany('App\PlanOrder', 'user_id');
    }
            
    public function product_price_changes() {
        return $this->hasOne('App\ProductPriceChange', 'user_id');
        // return $this->hasMany('App\ProductPriceChange', 'user_id');
    }
            
    public function received_orders() {
        return $this->hasOne('App\ReceivedOrder', 'user_id');
        // return $this->hasMany('App\ReceivedOrder', 'user_id');
    }
            
    public function sales() {
        return $this->hasOne('App\Sale', 'user_id');
        // return $this->hasMany('App\Sale', 'user_id');
    }
            
    public function user_roles() {
        return $this->hasOne('App\UserRole', 'user_id');
        // return $this->hasMany('App\UserRole', 'user_id');
    }
            
}