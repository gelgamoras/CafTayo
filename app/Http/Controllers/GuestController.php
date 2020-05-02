<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Period;
use Illuminate\Http\Request;


class GuestController extends Controller
{
    public function landingPage(){

        $records = Campus::all();
        return view('guest.home')->with('index', $records);
    }

    public function show(Campus $campus)
    {
        $cur_date = '%' . date('m/d/Y') . '%';
        $camp_everyday_menu = Menu::where('campus_id', $campus->id)->where('status', 'Active')->whereNull('dates')->get();
        $camp_random_menus = Menu::where('campus_id', $campus->id)->where('status', 'Active')->where('dates', 'LIKE', $cur_date)->get();
        $camp_menus = array_merge($camp_everyday_menu, $camp_random_menus);

        $periods = Period::get();
        $fooditems = array();

        dd($camp_menus);
        return view('guest.menu');
    }
}
