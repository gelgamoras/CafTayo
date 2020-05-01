<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [ 'menu_id', 'food_id', 'period_id', 'status' ];
    
    //MenuItem -> Food
    public function menuitemFood() {
        return $this->hasMany('App\Food', 'food_id', 'id');
    }

    //MenuItem -> Period
    public function menuitemPeriod() {
        return $this->hasMany('App\Period', 'period_id', 'id');
    }

    //MenuItem -> Menu
    public function menuitemMenu() {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}
