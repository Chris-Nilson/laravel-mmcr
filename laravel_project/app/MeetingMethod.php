<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingMethod extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function activities() {
        return $this->hasOne('App\Activitie', 'meeting_method_id');
        // return $this->hasMany('App\Activitie', 'meeting_method_id');
    }
            
    public function tickets() {
        return $this->hasOne('App\Ticket', 'meeting_method_id');
        // return $this->hasMany('App\Ticket', 'meeting_method_id');
    }
            
}