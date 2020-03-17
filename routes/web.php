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

Route::get('/menu/create', 'MenuController@create')->name('menu_create'); 

Route::get('/menu/view', 'MenuController@show')->name('menu_view'); 

Route::get('/food', 'FoodController@index')->name('menu_list'); 

Route::get('/food/view', 'FoodController@show')->name('food_view'); 

Route::get('/menu', 'MenuController@index')->name('food_list'); 

Route::get('/menu/everyday', 'MenuController@show_everydaymenu')->name('menu_everyday'); 

Route::get('/settings', 'PeriodController@get')->name('period_settings'); 

Route::get('/food/create', 'FoodController@create')->name('food_create'); 
