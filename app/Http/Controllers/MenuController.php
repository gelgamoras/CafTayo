<?php

namespace App\Http\Controllers;

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
        //Dummy Data 

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

        return view('welcome')->with('breakfast', $breakfast)
            ->with('lunch', $lunch)->with('afternoon', $afternoon)
            ->with('dinner', $dinner)->with('allfood', $all_food); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
