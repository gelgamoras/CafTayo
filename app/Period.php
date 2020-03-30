<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [];
    
    //MenuItem -> Period
    public function menuitemPeriod() {
        return $this->belongsTo('App\MenuItem', 'period_id', 'id');
    }

    //Periods -> LogPeriod
    public function periodLogPeriod() {
        return $this->hasMany('App\Period', 'period_id', 'id');
    }
}
