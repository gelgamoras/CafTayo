<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogMenu extends Model
{
    protected $fillable = [];
    
    //Users -> LogMenu
    public function userLogMenu() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //Menu -> LogMenu
    public function menuLogMenu() {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}
