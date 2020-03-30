<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPeriod extends Model
{
    protected $fillable = [];
    
    //Users -> LogPeriod
    public function userLogPeriod() {
        return $this->belongsTo('App\LogPeriod', 'user_id', 'id');
    }

    //Periods -> LogPeriod
    public function periodLogPeriod() {
        return $this->belongsTo('App\Period', 'period_id', 'id');
    }
}
