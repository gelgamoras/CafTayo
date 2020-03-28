<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $period_times = array(
            "Breakfast" => array(
                "Start" => "8:00 AM",
                "End" => "10:59 AM"
            ),
            "Lunch" => array(
                "Start" => "11:00 AM",
                "End" => "1:59 PM"
            ),
            "Afternoon" => array(
                "Start" => "2:00 PM",
                "End" => "5:59 PM"
            ),
            "Dinner" => array(
                "Start" => "6:00 PM",
                "End" => "8:00 PM"
            )
        );

        $categories = array('Ulam', 'Quick Bites', 'Sweet Delights', 'Snacks', 'Quenchers'); 
        $subcategories = array(
            "Ulam" => array(
                "Local", "International", "Pork", "Chicken", "Beef", "Poultry"
            ),
            "Quick Bites" => array(
                "Sammich", "Pizza", "Salad"
            ),
            "Sweet Delights" => array(
                "Cold", "Hot", "Pastry", "Ice Cream"
            ),
            "Snacks" => array(
                "Chocolate", "Chips", "Biscuit"
            ), 
            "Quenchers" => array(
                "Juice", "Water", "Soda", "Shake"
            )
        );

        $user = array(
            "id" => "1",
            "image" => "kitchencity.jpg", 
            "firstName" => "Juan",
            "lastName" => "Pedro", 
            "role" => "Concessionaire", 
            "campus" => "Main", 
            "catering" => "Kitchen City - Taft", 
            "contact" => "09292458748", 
            "email" => "juan.pedro@email.com", 
            "username" => "juan.pedro",
        );

        return view('concessionaire.settings')->with("period", $period_times)->with("categories", $categories)->with("subcategories", $subcategories)->with("user", $user); 
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
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        //
    }
}
