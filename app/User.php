<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'username', 'email', 'password', 'role', 'catering', 'contactno', 'coverphoto', 'campus_id', 'status'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Campus -> Users
    public function campusUsers() {
        return $this->belongsTo('App\Campuses', 'campus_id', 'id');
    }

    //Users -> LogCampus
    public function userLogCampus() {
        return $this->hasMany('App\LogCampus', 'user_id', 'id');
    }

    //Users -> LogCategory
    public function userLogCategory() {
        return $this->hasMany('App\LogCategories', 'user_id', 'id');
    }

    //Users -> LogFood
    public function userLogFood() {
        return $this->hasMany('App\LogFood', 'user_id', 'id');
    }

    //Users -> LogMenu
    public function userLogMenu() {
        return $this->hasMany('App\LogMenu', 'user_id', 'id');
    }

    //Users -> LogPeriod
    public function userLogPeriod() {
        return $this->hasMany('App\LogPeriod', 'user_id', 'id');
    }

    //Users -> LogUser
    public function u_userLogUser() {
        return $this->hasMany('App\LogUser', 'user_id', 'id');
    }

    //Users -> LogUser
    public function t_userLogUser() {
        return $this->hasMany('App\LogUser', 'target_id', 'id');
    }
}
