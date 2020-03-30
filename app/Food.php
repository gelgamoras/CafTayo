<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [];

    //Categories -> Campus
    public function campusFood() {
        return $this->belongsTo('App\Campus', 'campus_id', 'id');
    }

    //Categories -> Food
    public function p_categoriesFood() {
        return $this->belongsTo('App\Food', 'category_id', 'id');
    }

    //Categories -> Food
    public function s_categoriesFood() {
        return $this->belongsTo('App\Food', 'subcategory_id', 'id');
    }

    //MenuItem -> Food
    public function menuitemFood() {
        return $this->belongsTo('App\MenuItem', 'food_id', 'id');
    }

    //Food -> LogFood
    public function foodLogFood() {
        return $this->belongsTo('App\LogFood', 'food_id', 'id');
    }
}
