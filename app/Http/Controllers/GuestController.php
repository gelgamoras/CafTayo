<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;


class GuestController extends Controller
{
    //
    public function landingPage(){

        $records = Campus::all();
        return view('guest.home')->with('index', $records);
    }

}
