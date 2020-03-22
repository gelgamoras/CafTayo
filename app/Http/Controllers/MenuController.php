<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Dummy menu list 

        $records = array(
            array(
                "id"            => "1",
                "title"         => "Super Menu", 
                "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020"), 
            array(
                "id"            => "2",
                "title"         => "Average Menu", 
                "date"          => "03/05/2020, 03/31/2020, 03/10/2020, 03/19/2020, 03/25/2020, 03/15/2020"),
            array(
                "id"            => "3",
                "title"         => "So-so Menu", 
                "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020"),
            array(
                "id"            => "4",
                "title"         => "Ultimate Menu", 
                "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020")            
        );

        return view('concessionaire.menu.menu_List')->with('menu', $records); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Dummy food data
        $food = array(
            array(
                "id"            => "1",
                "image"         => "adobo.jpg", 
                "food"          => "Arroz Caldo w/ Egg", 
                "Category"      => "Ulam", 
                "Subcategory"   => "Local", 
                "Price"         => "P45.00"),
            array(
                "id"            => "2", 
                "image"         => "sinigang.jpg",
                "food"          => "Spicy Chicken Adobo", 
                "Category"      => "Ulam", 
                "Subcategory"   => "Local", 
                "Price"         => "P70.00"),
            array(
                "id"            => "3", 
                "image"         => "sinangag.jpg",
                "food"          => "Cordon Bleu", 
                "Category"      => "Ulam", 
                "Subcategory"   => "International", 
                "Price"         => "P85.00"), 
            array(
                "id"            => "4", 
                "image"         => "palabok.jpg", 
                "food"          => "Ham and Cheese Sandwich", 
                "Category"      => "Quick Bites", 
                "Subcategory"   => "Sammich", 
                "Price"         => "P45.00"),           
            array(
                "id"            => "5", 
                "image"         => "adobo.jpg", 
                "food"          => "Coffee Jelly", 
                "Category"      => "Sweet Delights", 
                "Subcategory"   => "Cold", 
                "Price"         => "P45.00"),              
        );

        return view('concessionaire.menu.menu_Create')->with('food', $food); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(/*Menu $menu*/)
    {
        //Dummy menu data 
        $breakfast = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $lunch = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $afternoon = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $dinner = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 

        $all_food = array(
            "Ulam" => array(
                array("FoodID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("FoodID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("FoodID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("FoodID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("FoodID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("FoodID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("FoodID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("FoodID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("FoodID" => "9", "FoodName" => "Coffee Jelly"),
                array("FoodID" => "10", "FoodName" => "Mango Jelly"),
                array("FoodID" => "9", "FoodName" => "Mango Graham")
            )
        ); 

        $menu_details = array(
            "MenuName" => "The Menu",
            "Dates" => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020"
        ); 

        return view('concessionaire.menu.menu_Edit')->with('breakfast', $breakfast)
            ->with('lunch', $lunch)->with('afternoon', $afternoon)
            ->with('dinner', $dinner)->with('allfood', $all_food)->with('details', $menu_details);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function showToday(){
        
        //DUMMY DATA
        $breakfast = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $lunch = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $afternoon = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $dinner = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 

        $all_food = array(
            "Ulam" => array(
                array("FoodID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("FoodID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("FoodID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("FoodID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("FoodID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("FoodID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("FoodID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("FoodID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("FoodID" => "9", "FoodName" => "Coffee Jelly"),
                array("FoodID" => "10", "FoodName" => "Mango Jelly"),
                array("FoodID" => "9", "FoodName" => "Mango Graham")
            )
        ); 

        return view('concessionaire.menu.menu_Detail_Today')->with('breakfast', $breakfast)
        ->with('lunch', $lunch)->with('afternoon', $afternoon)
        ->with('dinner', $dinner)->with('allfood', $all_food); 
    }

    public function showEveryday(){
        //DUMMY DATA
        $breakfast = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $lunch = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $afternoon = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 
        $dinner = array(
            "Ulam" => array(
                array("MenuItemID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("MenuItemID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("MenuItemID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("MenuItemID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("MenuItemID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("MenuItemID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("MenuItemID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("MenuItemID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("MenuItemID" => "9", "FoodName" => "Coffee Jelly"),
                array("MenuItemID" => "10", "FoodName" => "Mango Jelly"),
                array("MenuItemID" => "9", "FoodName" => "Mango Graham")
            )
        ); 

        $all_food = array(
            "Ulam" => array(
                array("FoodID" => "1", "FoodName" => "Saver's Meal - Cheesy Hotdog w/ Egg"),
                array("FoodID" => "2", "FoodName" => "Saver's Meal - Hotdog w/ Egg"),
                array("FoodID" => "3", "FoodName" => "Saver's Meal - Spam w/ Egg"),
                array("FoodID" => "4", "FoodName" => "Arroz Caldo w/ Egg"),
                array("FoodID" => "5", "FoodName" => "Garlic Rice")
            ), 
            "Quick Bites" => array(
                array("FoodID" => "6", "FoodName" => "Ham & Cheese Sanwich"),
                array("FoodID" => "7", "FoodName" => "Egg Salad Sandwich"),
                array("FoodID" => "8", "FoodName" => "Hawaiian Pizza"),
            ),
            "Sweet Delights" => array(
                array("FoodID" => "9", "FoodName" => "Coffee Jelly"),
                array("FoodID" => "10", "FoodName" => "Mango Jelly"),
                array("FoodID" => "9", "FoodName" => "Mango Graham")
            )
        ); 

        return view('concessionaire.menu.menu_Detail_Everyday')->with('breakfast', $breakfast)
        ->with('lunch', $lunch)->with('afternoon', $afternoon)
        ->with('dinner', $dinner)->with('allfood', $all_food); 
    }
}
