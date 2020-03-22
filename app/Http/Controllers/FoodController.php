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
        /*
            ----------------DUMMY FOOD-----------------
            Save query results to $food_records
        */ 

        $food_records = array(
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
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
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
