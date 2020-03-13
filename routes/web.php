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

//Im not sure whether to use ::resource or ::get so uh 

Route::get('/', 'MenuController@show_todaymenu'); 

Route::get('/plan-menu', 'MenuController@create'); 

Route::get('/view-menu', 'MenuController@show'); 

Route::get('/manage-food', 'FoodController@index'); 

Route::get('/view-food', 'FoodController@show'); 

Route::get('/manage-menu', 'MenuController@index'); 

Route::get('/everyday', 'MenuController@show_everydaymenu'); 
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