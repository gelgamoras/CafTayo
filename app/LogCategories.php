<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogCategories extends Model
{
    protected $fillable = [];
    
    //Users -> LogCategory
    public function userLogCategory() {
        return $this->belongsTo('App\LogCategory', 'user_id', 'id');
    }

    //Category -> LogCategory
    public function categoriesLogCategory() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
