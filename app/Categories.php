<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [ 'name', 'campus_id', 'parent_id', 'p_name', 'status' ];

    //Campus -> Categories
    public function campusCategories() {
        return $this->hasMany('App\Campuses', 'campus_id', 'id');
    }

    //Categories -> Categories
    public function p_categoriesCategories() {
        return $this->hasMany('App\Categories', 'category_id', 'id');
    }

    //Categories -> Food
    public function p_categoriesFood() {
        return $this->hasMany('App\Food', 'category_id', 'id');
    }

    //Categories -> Food
    public function s_categoriesFood() {
        return $this->hasMany('App\Food', 'subcategory_id', 'id');
    }

    //Category -> LogCategory
    public function categoriesLogCategory() {
        return $this->hasMany('App\LogCategory', 'category_id', 'id');
    }
}
