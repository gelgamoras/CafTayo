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

Route::middleware('auth')->group(function() { 
    Route::prefix('campus')->group(function () {
        Route::get('/', 'CampusController@index')->name('campus.index');
        Route::get('/create', 'CampusController@create')->name('campus.create');
        Route::post('/create', 'CampusController@store')->name('campus.store');
        Route::get('/{id}', 'CampusController@show')->name('campus.show');
        Route::get('/{id}/edit', 'CampusController@edit')->name('campus.edit');
        Route::put('/{id}', 'CampusController@update')->name('campus.update');
        Route::delete('/index/{id}', 'CampusController@destroy')->name('campus.destroy');
    });
});


/*
//categories by ELLAAAAA
Route::get('/categories/index', 'CategoriesController@index')->name('categories.index');
Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
Route::post('/categories/create', 'CategoriesController@store')->name('categories.store');
Route::get('categories/index/{id}', 'CategoriesController@show')->name('categories.show');
Route::get('categories/index/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
Route::put('categories/index/{id}', 'CategoriesController@update')->name('categories.update');
Route::delete('categories/index/{id}', 'CategoriesController@destroy')->name('categories.destroy');
*/


