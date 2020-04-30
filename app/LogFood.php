<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogFood extends Model
{
    protected $fillable = ['user_id', 'action', 'food_id'];
    
    //Users -> LogFood
    public function userLogFood() {
        return $this->belongsTo('App\LogFood', 'user_id', 'id');
    }

    //Food -> LogFood
    public function foodLogFood() {
        return $this->belongsTo('App\Food', 'user_id', 'id');
    }
}
