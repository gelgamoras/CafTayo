<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [ 'Name', 'Address', 'Status' ];

    //Campus -> CampusUsers
    public function campusUsers() {
        return $this->hasMany('App\UserCampus', 'campus_id', 'id');
    }

    //Campus -> Menus
    public function campusMenus() {
        return $this->hasMany('App\Menu', 'campus_id', 'id');
    }

    //Campus -> Categories
    public function campusCategories() {
        return $this->hasMany('App\Categories', 'campus_id', 'id');
    }

    //Campus -> Food
    public function campusFood() {
        return $this->hasMany('App\Food', 'campus_id', 'id');
    }
}
