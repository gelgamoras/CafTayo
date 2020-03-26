<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Dummy data 
        $users = array(
            array(
                "id" => "1", 
                "image" => "dog.png", 
                "name" => "John Doe",
                "role" => "Administrator", 
                "campus" => "Main", 
                "catering" => "N/A", 
                "status" => "Active"
            ),
            array(
                "id" => "2", 
                "image" => "kitchencity.jpg", 
                "name" => "Juan Pedro",
                "role" => "Concessionaire", 
                "campus" => "Main", 
                "catering" => "Kitchen City - Taft", 
                "status" => "Active"
            ),
            array(
                "id" => "3", 
                "image" => "kitchencity.jpg", 
                "name" => "Maria Santos",
                "role" => "Concessionaire", 
                "campus" => "SDA", 
                "catering" => "Kitchen City - SDA", 
                "status" => "Active"
            ),
            array(
                "id" => "4", 
                "image" => "chefstation.jpg", 
                "name" => "Maria Santos",
                "role" => "Concessionaire", 
                "campus" => "AKIC", 
                "catering" => "Chef's Station", 
                "status" => "Active"
            )
        ); 

        return view('administrator.users.users_List')->with('records', $users); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.users.users_Create'); 
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
    public function show(/*$id*/)
    {
        //Dummmy data 

        $user = array(
            "id" => "1",
            "image" => "dog.png", 
            "firstName" => "John",
            "lastName" => "Doe", 
            "role" => "Administrator", 
            "campus" => "Main", 
            "catering" => "Kitchen City - Taft", 
            "contact" => "09292458748", 
            "email" => "john.doe@email.com", 
            "username" => "john.doe",
            "status" => "Active"
        );

        return view('administrator.users.users_Detail')->with('record', $user); 
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
