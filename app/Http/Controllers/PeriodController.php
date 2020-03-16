<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriodController extends Controller
{
    //

    public function get(){
        $period_times = array(
            "Breakfast" => array(
                "Start" => "8:00 AM",
                "End" => "10:59 AM"
            ),
            "Lunch" => array(
                "Start" => "11:00 AM",
                "End" => "1:59 PM"
            ),
            "Afternoon" => array(
                "Start" => "2:00 PM",
                "End" => "5:59 PM"
            ),
            "Dinner" => array(
                "Start" => "6:00 PM",
                "End" => "8:00 PM"
            )
        );

        return view('concessionaire.settings')->with("period", $period_times); 
    }
}
