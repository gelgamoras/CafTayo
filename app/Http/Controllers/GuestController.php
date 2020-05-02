<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Categories; 
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
        $p_categories = Categories::all()->where('campus_id', $campus->id)->where('parent_id', null)->where('status', 'Active'); 
        $categories = collect(); 

        foreach($periods as $key=>$period)
        {
            $food_items = array();
            $menu_items = MenuItem::where('period_id', $period->id)->whereIn('menu_id', $menu_ids)->get();
            
            foreach($menu_items as $menu_item) 
            {
                $food = Food::where('id', $menu_item->food_id)->where('campus_id', $campus->id)->get();

                array_push($food_items, $food);
                foreach($p_categories as $category){
                    if($food[0]->category_id == $category->id){
                        if(!$categories->contains('id', $category->id)){
                            $categories->push($category);
                        }
                    }
                    else if($food[0]->categoriesFood->categoriesCategories['id'] == $category->id){
                        if(!$categories->contains('id', $category->id)){
                            $categories->push($category); 
                        }
                    }
                }
            }

            array_push($foods, $food_items);  
        }
        
        foreach($foods as $food) array_unique($food);
        return view('guest.menu')->with('foods', $foods)->with('categories', $categories)->with('campus', $campus)->with('periods', $periods);
    }

    public function foodPage(Campus $campus, Food $food){

        $ingredients = explode(', ', $food->ingredients); 
        return view('guest.food')->with('food', $food)->with('ingredients', $ingredients); 
    }
}

