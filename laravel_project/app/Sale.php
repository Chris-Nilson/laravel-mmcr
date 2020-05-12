<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = ['id'];

    protected $with = [user, bucket, client, insurance, entreprise, ];

    
    public function user() {
        
        return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User', 'user_id');
    }
            
    public function bucket() {
        
        return $this->belongsTo('App\Bucket', 'bucket_id');
        // return $this->belongsToMany('App\Bucket', 'bucket_id');
    }
            
    public function client() {
        
        return $this->belongsTo('App\Client', 'client_id');
        // return $this->belongsToMany('App\Client', 'client_id');
    }
            
    public function insurance() {
        
        return $this->belongsTo('App\Insurance', 'insurance_id');
        // return $this->belongsToMany('App\Insurance', 'insurance_id');
    }
            
    public function entreprise() {
        
        return $this->belongsTo('App\Entreprise', 'entreprise_id');
        // return $this->belongsToMany('App\Entreprise', 'entreprise_id');
    }
            
    public function debts() {
        return $this->hasOne('App\Debt', 'sale_id');
        // return $this->hasMany('App\Debt', 'sale_id');
    }
            
}