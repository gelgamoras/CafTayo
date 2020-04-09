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


Route::get('/', function () { return view('welcome'); });

Route::prefix('user')->group(function () {
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');

//categories by ELLAAAAA
Route::get('/categories/index', 'CategoriesController@index')->name('categories.index');
Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
Route::post('/categories/create', 'CategoriesController@store')->name('categories.store');
Route::get('categories/index/{id}', 'CategoriesController@show')->name('categories.show');
Route::get('categories/index/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
Route::put('categories/index/{id}', 'CategoriesController@update')->name('categories.update');
Route::delete('categories/index/{id}', 'CategoriesController@destroy')->name('categories.destroy');

//Campuses 
Route::get('/campus/index', 'CampusController@index')->name('campus.index');
Route::get('/campus/create', 'CampusController@create')->name('campus.create');
Route::post('/campus/create', 'CampusController@store')->name('campus.store');
Route::get('campus/index/{id}', 'CampusController@show')->name('campus.show');
Route::get('campus/index/{id}/edit', 'CampusController@edit')->name('campus.edit');
Route::put('campus/index/{id}', 'CampusController@update')->name('campus.update');
Route::delete('campus/index/{id}', 'CampusController@destroy')->name('campus.destroy');