<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityResource extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function activity() {
        // TODO change App\Activity class to another existing class
		// TODO create the inverse relationship method in the correct model class
		// TODO add '_activity_resources' in the eloquent of the correct class in its controller
		// TODO copy the code in comment to the correct class and change '_activity_resources' function name
		/*
        public function _activity_resources() {
            return $this->hasOne('App\ActivityResource', 'activity_id');
            // return $this->hasMany('App\ActivityResource', 'activity_id');
        }
        */
        return $this->belongsTo('App\Activity', 'activity_id');
        // return $this->belongsToMany('App\Activity', 'activity_id');
    }
            
    public function resource() {
        
        return $this->belongsTo('App\Resource', 'resource_id');
        // return $this->belongsToMany('App\Resource', 'resource_id');
    }
            
}