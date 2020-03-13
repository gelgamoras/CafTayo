<?php

namespace App\Http\Controllers;

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
        $food_items = array(
            array(
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

        return view('concessionaire/managefood')->with('food_items', $food_items); 
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
    public function show(/*$id*/) //dummy data for now 
    {
        //
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

        return view('concessionaire/viewfood')->with("food", $food)->with("ingredients", $ingredients); 
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
