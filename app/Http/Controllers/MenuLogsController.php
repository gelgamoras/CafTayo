<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuLogsController extends Controller
{
    public function index(){

        return view('administrator.menulogs.menulogs_List'); 
    }
}
