<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogUser extends Model
{
    protected $fillable = [];
    
    //Users -> LogUser
    public function u_userLogUser() {
        return $this->belongsTo('App\LogUser', 'user_id', 'id');
    }

    //Users -> LogUser
    public function t_userLogUser() {
        return $this->belongsTo('App\LogUser', 'target_id', 'id');
    }
}
