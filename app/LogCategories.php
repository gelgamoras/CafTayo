<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogCategories extends Model
{
    protected $fillable = [ 'user_id', 'action', 'category_id' ];
    
    //Users -> LogCategory
    public function userLogCategory() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //Category -> LogCategory
    public function categoriesLogCategory() {
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }
}
