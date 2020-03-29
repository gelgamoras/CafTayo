<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = array(
            array(
                "id" => "1", 
                "name" => "Taft", 
                "address" => "2544 Taft Ave, Malate, Manila, 1004 Metro Manila"
            ),
            array(
                "id" => "2",
                "name" => "SDA",
                "address" => "950 Ocampo St, Malate, Manila, 1004 Metro Manila"
            ),
            array(
                "id" => "3",
                "name" => "AKIC",
                "address" => "2509 Arellano Ave, San Andres Bukid, Manila, 1004 Metro Manila"
            )
        ); 

        return view('administrator.campus.campus_List')->with('campuses', $campuses); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.campus.campus_Create'); 
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
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        //
    }
}
