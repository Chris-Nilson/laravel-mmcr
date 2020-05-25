<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function meeting_method() {
        
        return $this->belongsTo('App\MeetingMethod', 'meeting_method_id');
        // return $this->belongsToMany('App\MeetingMethod', 'meeting_method_id');
    }
            
    public function activity_resources() {
        return $this->hasOne('App\ActivityResource', 'activity_id');
        // return $this->hasMany('App\ActivityResource', 'activity_id');
    }
            
}