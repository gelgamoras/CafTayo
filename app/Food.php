<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['name', 'category_id', 'shortDescription', 'description', 'ingredients', 'calories', 'isHalal', 'price', 'campus_id', 'coverphoto', 'status'];

    //Categories -> Campus
    public function campusFood() {
        return $this->belongsTo('App\Campus', 'campus_id', 'id');
    }

    //Categories -> Food
    public function categoriesFood() {
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }

    //MenuItem -> Food
    public function menuitemFood() {
        return $this->hasMany('App\MenuItem', 'food_id', 'id');
    }

    //Food -> LogFood
    public function foodLogFood() {
        return $this->belongsTo('App\LogFood', 'food_id', 'id');
    }
}
