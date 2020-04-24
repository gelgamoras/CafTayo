<?php

namespace App\Http\Controllers;

use App\LogCampus;
use App\LogCategories;
use App\LogFood;
use App\LogMenu;
use App\LogPeriod;
use App\LogUser;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCampus()
    {
        $records = LogCampus::all();
        return view('logs.campus.index')->with('index', $records);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogCampus  $LogCampus
     * @return \Illuminate\Http\Response
     */
    public function showCampus($id)
    {
       $LogCampus = LogCampus::find($id);
        return view('logs.campus.single')->with('logcampus', $LogCampus);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategory()
    {
        $records = LogCategories::all();
        return view('logs.category.index')->with('index', $records);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogCategory  $LogCategory
     * @return \Illuminate\Http\Response
     */
    public function showCategory($id)
    {
        $LogCategory = LogCategories::find($id);
        return view('logs.category.single')->with('logcategory', $LogCategory);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFood()
    {
        $records = LogFood::all();
        return view('logs.food.index')->with('index', $records);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogFood  $LogFood
     * @return \Illuminate\Http\Response
     */
    public function showFood($id)
    {
        $LogFood = LogFood::find($id);
        return view('logs.food.single')->with('logfood', $LogFood);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMenu()
    {
        $records = LogMenu::all();
        return view('logs.menu.index')->with('index', $records);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogMenu  $LogMenu
     * @return \Illuminate\Http\Response
     */
    public function showMenu($id)
    {
       $LogMenu = LogMenu::find($id);
       return view('logs.menu.single')->with('logmenu', $LogMenu);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPeriod()
    {
        $records = LogPeriod::all();
        return view('logs.period.index')->with('index', $records);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogPeriod  $LogPeriod
     * @return \Illuminate\Http\Response
     */
    public function showPeriod($id)
    {
       $LogPeriod = LogPeriod::find($id);
       return view('logs.menu.single')->with('logperiod', $LogPeriod);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $records = LogUser::all();
        return view('logs.user.index')->with('index', $records);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogUser  $LogUser
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        $LogUser = LogUser::find($id);
        return view('campus.single')->with('loguser', $LogUser);
    }
}
