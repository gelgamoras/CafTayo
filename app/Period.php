<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [ 'period', 'start', 'end', 'status' ];
    
    //MenuItem -> Period
    public function menuitemPeriod() {
        return $this->hasMany('App\MenuItem', 'period_id', 'id');
    }

    //Periods -> LogPeriod
    public function periodLogPeriod() {
        return $this->hasMany('App\LogPeriod', 'period_id', 'id');
    }
}
