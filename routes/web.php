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

Route::get('/', function () {
    return view('temp-index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//======== CONCESSIONAIRE ========
//----MENU
Route::get('/concessionaire', 'MenuController@showToday')->name('con_homepage'); 
Route::get('/concessionaire/menu/create', 'MenuController@create')->name('menu_create'); 
Route::get('/concessionaire/menu', 'MenuController@index')->name('menu_list'); 
Route::get('/concessionaire/menu/1', 'MenuController@show')->name('menu_detail'); 
Route::get('/concessionaire/menu/everyday', 'MenuController@showEveryday')->name('menu_everyday'); 
//----FOOD
Route::get('/concessionaire/food/create', 'FoodController@create')->name('food_create');
Route::get('/concessionaire/food', 'FoodController@index')->name('food_list');  
Route::get('/concessionaire/food/1', 'FoodController@show')->name('food_detail'); 
//----SETTINGS (Period)
Route::get('/concessionaire/settings', 'PeriodController@index')->name('con_settings');

//======== ADMINISTRATOR ========
Route::get('/administrator', function(){return view('administrator.administrator');})->name('admin_homepage');
Route::get("/administrator/users", 'UserController@index')->name('users_list'); 