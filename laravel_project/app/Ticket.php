<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function raised() {
        // TODO change App\Raised class to another existing class
		// TODO create the inverse relationship method in the correct model class
		// TODO add '_tickets' in the eloquent of the correct class in its controller
		// TODO copy the code in comment to the correct class and change '_tickets' function name
		/*
        public function _tickets() {
            return $this->hasOne('App\Ticket', 'raised_id');
            // return $this->hasMany('App\Ticket', 'raised_id');
        }
        */
        return $this->belongsTo('App\Raised', 'raised_id');
        // return $this->belongsToMany('App\Raised', 'raised_id');
    }
            
    public function assignee() {
        // TODO change App\Assignee class to another existing class
		// TODO create the inverse relationship method in the correct model class
		// TODO add '_tickets' in the eloquent of the correct class in its controller
		// TODO copy the code in comment to the correct class and change '_tickets' function name
		/*
        public function _tickets() {
            return $this->hasOne('App\Ticket', 'assignee_id');
            // return $this->hasMany('App\Ticket', 'assignee_id');
        }
        */
        return $this->belongsTo('App\Assignee', 'assignee_id');
        // return $this->belongsToMany('App\Assignee', 'assignee_id');
    }
            
    public function meeting_method() {
        
        return $this->belongsTo('App\MeetingMethod', 'meeting_method_id');
        // return $this->belongsToMany('App\MeetingMethod', 'meeting_method_id');
    }
            
}