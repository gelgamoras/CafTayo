<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogCampus extends Model
{
    protected $fillable = [ 'user_id', 'campus_id', 'action' ];
    
    //Users -> LogCampus
    public function userLogCampus() {
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }
}
