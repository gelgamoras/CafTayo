<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MenuController@index'); 


Route::resource("menu", "MenuController");

//Routes below are just getting the views :"^) 
/*
Route::get('/plan-menu', function(){
    return view('concessionaire/planmenu'); 
}); 

Route::get('/manage-food', function(){
    return view('concessionaire/managefood'); 
}); 

Route::get('/view-food', function(){
    return view('concessionaire/viewfood'); 
}); 

Route::get('/everyday', function(){
    return view('concessionaire/everydaymenu'); 
});

Route::get('/manage-menu', function(){
    return view('concessionaire/managemenus'); 
});

Route::get('/view-menu', function(){
    return view('concessionaire/viewmenu'); 
});

Route::get('/preferences', function(){
    return view('concessionaire/preferences'); 
}); 

Route::get('/my-profile', function(){
    return view('concessionaire/profile'); 
}); 

*/ 