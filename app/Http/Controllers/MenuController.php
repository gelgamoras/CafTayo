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
        $food = Food::where('campus_id', $campus->id)->get(); 
        $menuitems = MenuItem::where('menu_id', $menu->id);
        $periods = Period::all(); 
        $categories = collect(); 

        $all_categories = Categories::where('status', 'Active')->where('campus_id', $campus->id)->get(); 

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
            $menu->name = $request->name;
            $menu->dates = $request->dates;
            $menu->save();

            $menuitems = MenuItem::where('menu_id', $menu->id);

            foreach($request->period as $i=>$period) 
            {
                foreach($period as $period_arr)
                {
                    //Check if $period_arr exists - continue
                    //If exists in menuitems but not in arr - delete
                    //Exists in arr but not in menu items - create
                    MenuItem::create([
                        'menu_id' => $menu->id, 
                        'food_id' => $period_arr, 
                        'period_id' => $i, 
                        'status' => 'Active'
                    ]);
                }
            }   

            LogMenu::create([
                'user_id' => auth()->user()->id,
                'menu_id' => $menu->id,
                'action' => 'Updated Menu'
            ]); 

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
        //
    }
}