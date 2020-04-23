<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogUser extends Model
{
    protected $fillable = [ 
        'user_id', 'action', 'target_id'
    ];
    
    //Users -> LogUser
    public function u_userLogUser() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //Users -> LogUser
    public function t_userLogUser() {
        return $this->belongsTo('App\User', 'target_id', 'id');
    }
}
