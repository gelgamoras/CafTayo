<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [ 'name', 'campus_id', 'parent_id', 'status' ];

    //Campus -> Categories
    public function campusCategories() {
        return $this->belongsTo('App\Campus', 'campus_id', 'id');
    }

    //Categories -> Categories
    public function categoriesCategories() {
        return $this->belongsTo('App\Categories', 'parent_id', 'id');
    }

    //Categories -> Food
    public function categoriesFood() {
        return $this->hasMany('App\Food', 'category_id', 'id');
    }

    //Category -> LogCategory
    public function categoriesLogCategory() {
        return $this->hasMany('App\LogCategory', 'category_id', 'id');
    }
}
