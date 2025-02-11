<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [ 'name', 'campus_id', 'dates', 'status' ];

    //Campus -> Menus
    public function campusMenus() {
        return $this->belongsTo('App\Campuses', 'campus_id', 'id');
    }

    //MenuItem -> Menu
    public function menuitemMenu() {
        return $this->belongsTo('App\MenuItem', 'menu_id', 'id');
    }
}
