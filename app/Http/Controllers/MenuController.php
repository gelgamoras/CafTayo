<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Categories;
use App\Food;
use App\LogMenu;
use App\Menu;
use App\MenuItem;
use App\Period;
use App\Rules\ValidDates;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Campus $campus)
    {
        $records = Menu::where('campus_id', $campus->id)->where('Status', 'Active')->get();
        return view('menu.index')->with('index', $records)->with('campus', $campus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Campus $campus)
    {   
        $foods = Food::where('campus_id', $campus->id)->where('status', 'Active')->get();
        $periods = Period::all(); 
        $categories = collect(); 
        $all_categories = Categories::where('campus_id', $campus->id)->where('status', 'Active')->get(); 

        if(count($all_categories) < 1) return redirect()->route('categories.index', $campus)->with('error', 'This campus does not have any categories. Add a category first!');
        if(count($foods) < 1) return redirect()->route('food.index', $campus)->with('error', 'This campus does not have any food. Add food first!');

        foreach($all_categories as $c){
            if($c->categoriesFood->count() > 0){
                $categories->push($c); 
                if($c->parent_id != null){
                    if(!$categories->contains('id', $c->parent_id)){
                        $categories->push($c->categoriesCategories); 
                    }   
                }
            }
        }

        return view('menu.create')->with('index', $foods)->with('categories', $categories)->with('periods', $periods)->with('campus', $campus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Campus $campus)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => ['required', 'string', 'max:50'],
            'dates' => ['required', new ValidDates()],
            'period' => ['required', 'array']
        ],
        [
            'name.required' => 'Menu name is required',
            'name.string' => 'Menu name must be a string',
            'name.max' => 'Menu name cannot exceed :max characters',
            'dates.required' => 'Menu dates are required',
            'period.required' => 'Menu needs to have food items',
            'period.array' => 'Menu needs to be in an array'
        ]);

        if(!$validator->fails())
        {
            $menu = Menu::create([
                'name' => $request->name,
                'campus_id' => $campus->id,
                'dates' => $request->dates,
                'status' => 'Active'
            ]);
          
            foreach($request->period as $i=>$period) 
            {
                foreach($period as $period_arr)
                {
                    MenuItem::create([
                        'menu_id' => $menu->id, 
                        'food_id' => $period_arr, 
                        'period_id' => $i, 
                        'status' => 'Available'
                    ]);
                }
            }   

            LogMenu::create([
                'user_id' => auth()->user()->id,
                'menu_id' => $menu->id,
                'action' => 'Created Menu'
            ]); 

            return redirect()->route('menu.index', $campus)->with('success', 'You have successfullly added the menu!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus, Menu $menu)
    {
        if($menu->campus_id != $campus->id) abort(403);
        if($menu->status == "Deleted") return abort(403);

        $food = Food::where('campus_id', $campus->id)->get(); 
        $menuitems = MenuItem::where('menu_id', $menu->id);
        $periods = Period::all(); 
        $categories = collect(); 

        $all_categories = Categories::where('status', 'Active')->where('campus_id', $campus->id)->get();
        
        if(count($all_categories) < 1) return redirect()->route('categories.index', $campus)->with('error', 'This campus does not have any categories. Add a category first!');
        if(count($food) < 1) return redirect()->route('food.index', $campus)->with('error', 'This campus does not have any food. Add food first!');

        foreach($all_categories as $c){
            if($c->categoriesFood->count() > 0){
                $categories->push($c); 
                if($c->parent_id != null){
                    if(!$categories->contains('id', $c->parent_id)){
                        $categories->push($c->categoriesCategories); 
                    }   
                }
            }
        }
        return view('menu.edit')->with('index', $food)->with('menu', $menu)->with('menuitems', $menuitems)->with('campus', $campus)
            ->with('periods', $periods)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus, Menu $menu)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => ['required', 'string', 'max:50'],
            'period' => ['required', 'array']
        ],
        [
            'name.required' => 'Menu name is required',
            'name.string' => 'Menu name must be a string',
            'name.max' => 'Menu name cannot exceed :max characters',
            'dates.required' => 'Menu dates are required',
            'period.required' => 'Menu needs to have food items',
            'period.array' => 'Menu needs to be in an array'
        ]);

        $validator->sometimes('dates', ['required', new ValidDates()], function($input) {
            return $input->name != "Everyday Menu";
        });

        if(!$validator->fails())
        {
            if($menu->name != "Everyday Menu") $menu->name = $request->name;
            $menu->dates = $request->dates;
            $menu->save();

            $x = false;
            foreach($request->period as $i=>$period) 
            {
                $menuitems = MenuItem::where('menu_id', $menu->id)->where('period_id', $i)->get();
                $menuitems_id = array();
                foreach($menuitems as $menuitem) array_push($menuitems_id, $menuitem->food_id);

                $removed = array_diff($menuitems_id, $period);
                foreach($removed as $x) MenuItem::where('menu_id', $menu->id)->where('period_id', $i)->where('food_id', $x)->delete();
                
                $added = array_diff($period, $menuitems_id);
                foreach($added as $x) MenuItem::create(['menu_id' => $menu->id, 'food_id' => $x, 'period_id' => $i, 'status' => 'Available']);
            }   

            LogMenu::create(['user_id' => auth()->user()->id, 'menu_id' => $menu->id, 'action' => 'Edited Menu' ]); 
            return redirect()->route('menu.index', $campus)->with('success', 'You have successfullly updated the menu!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus, Menu $menu)
    {
        $menu->status = 'Deleted'; 
        $menu->save(); 

        LogMenu::create([
            'user_id' => auth()->user()->id,
            'menu_id' => $menu->id,
            'action' => 'Deleted Menu'
        ]);
        return Redirect()->route('menu.index', $campus)->with('success', 'You have successfullly deleted the menu!');

    }
}