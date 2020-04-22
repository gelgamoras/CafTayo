<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCampus extends Model
{
    protected $fillable = [ 'campus_id', 'user_id' ];

    //User -> User Campus
    public function userUserCampus() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //Campus -> User Campus
    public function campusUserCampus() {
        return $this->belongsTo('App\Campus', 'campus_id', 'id');
    }
}
