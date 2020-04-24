<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPeriod extends Model
{
    protected $fillable = [ 'user_id', 'period_id', 'action'];
    
    //Users -> LogPeriod
    public function userLogPeriod() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //Periods -> LogPeriod
    public function periodLogPeriod() {
        return $this->belongsTo('App\Period', 'period_id', 'id');
    }
}
