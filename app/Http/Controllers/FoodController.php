<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dummy food 
        $records = array(
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

        return view('concessionaire.food.food_List')->with('food_items', $records); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('concessionaire.food.food_Create'); 
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
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(/*Food $food*/)
    {
        $food = array(
            "name"      => "Sinigang",
            "category"  => "Ulam",
            "shortdesc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            "desc"      => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque.",
            "ingredients" => "Pork, Tamarind, Taro, Tomato, Water Spinach, Radish, Okra, Eggplant, Green Bean, Onion, Chili Pepper",
            "subcategory" => "Local",
            "calories"    => "150",
            "price"       => "150",
            "halal"       => "1",
            "image"       => "sinigang.jpg"
        ); 

        $ingredients = explode(', ', $food['ingredients']); 

        return view('concessionaire.food.food_Detail')->with("food", $food)->with("ingredients", $ingredients); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }

}
