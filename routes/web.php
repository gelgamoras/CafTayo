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


Route::get('/', 'MenuController@show_todaymenu')->name('menu_today'); 

Route::get('/plan-menu', 'MenuController@create')->name('menu_create'); 

Route::get('/view-menu', 'MenuController@show')->name('menu_view'); 

Route::get('/manage-food', 'FoodController@index')->name('menu_list'); 

Route::get('/view-food', 'FoodController@show')->name('food_view'); 

Route::get('/manage-menu', 'MenuController@index')->name('food_list'); 

Route::get('/everyday', 'MenuController@show_everydaymenu')->name('menu_everyday'); 

Route::get('/settings', 'PeriodController@get')->name('period_settings'); 

Route::get('/new-food', 'FoodController@create')->name('food_create'); 
