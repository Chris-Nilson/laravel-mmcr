<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sme extends Model
{
    protected $guarded = ['id'];

    protected $with = [];

    
    public function enterprise() {
        
        return $this->belongsTo('App\Enterprise', 'enterprise_id');
        // return $this->belongsToMany('App\Enterprise', 'enterprise_id');
    }
            
    public function business_sector() {
        
        return $this->belongsTo('App\BusinessSector', 'business_sector_id');
        // return $this->belongsToMany('App\BusinessSector', 'business_sector_id');
    }
            
    public function experience_range() {
        
        return $this->belongsTo('App\ExperienceRange', 'experience_range_id');
        // return $this->belongsToMany('App\ExperienceRange', 'experience_range_id');
    }
            
    public function turnover_range() {
        
        return $this->belongsTo('App\TurnoverRange', 'turnover_range_id');
        // return $this->belongsToMany('App\TurnoverRange', 'turnover_range_id');
    }
            
}