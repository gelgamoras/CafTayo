<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogCampus extends Model
{
    protected $fillable = [ 'user_id', 'campus_id', 'action' ];
    
    //Users -> LogCampus
    public function userLogCampus() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //Campus -> LogCampus
    public function campusLogCampus() {
        return $this->belongsTo('App\Campus', 'campus_id', 'id');
    }
}
