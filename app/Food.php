<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['name', 'category_id', 'shortDescription', 'description', 'ingredients', 'calories', 'isHalal', 'price', 'campus_id', 'coverphoto', 'isFeatured', 'status'];

    //Categories -> Campus
    public function campusFood() {
        return $this->belongsTo('App\Campuses', 'campus_id', 'id');
    }

    //Categories -> Food
    public function p_categoriesFood() {
        return $this->belongsTo('App\Food', 'category_id', 'id');
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
