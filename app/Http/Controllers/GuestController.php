<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Food;
use App\Menu;
use App\MenuItem;
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
        $menu = Menu::where('campus_id', $campus->id)->where('status', 'Active')->where(function($query) use ($cur_date) { $query->where('dates', 'LIKE', "%{$cur_date}%")->orwhereNull('dates'); })->get();
        $menu_ids = array();
        foreach($menu as $m) array_push($menu_ids, $m->id);
        $periods = Period::get();
        $foods = array();
       
        foreach($periods as $key=>$period)
        {
            $food_items = array();
            $menu_items = MenuItem::where('period_id', $period->id)->whereIn('menu_id', $menu_ids)->get();
            
            foreach($menu_items as $menu_item) 
            {
                $food = Food::where('id', $menu_item->food_id)->where('campus_id', $campus->id)->get();
                array_push($food_items, $food);
            }
            array_push($foods, $food_items);  
        }

        foreach($foods as $food) array_unique($food);
        return view('guest.menu')->with('foods', $foods);
    }
}
