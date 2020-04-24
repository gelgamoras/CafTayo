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

// All Users
Route::prefix('user')->group(function() {
    
    // Auth Routes
    Auth::routes();
});

Route::middleware('auth')->group(function() { 

    // All Users
    Route::prefix('user')->group(function() {
    
        // Dashboard
        Route::get('/', 'DashboardController@index')->name('dashboard.index');
    
        // Profile
        Route::get('/myprofile', 'DashboardController@myprofile')->name('dashboard.profile');
        Route::get('/editprofile', 'DashboardController@editprofile')->name('dashboard.edit.profile');
        Route::post('/editprofile', 'DashboardController@updateprofile')->name('dashboard.update.profile');
        Route::get('/changepassword', 'DashboardController@changepassword')->name('dashboard.edit.password');
        Route::post('/changepassword', 'DashboardController@changepassword')->name('dashboard.update.password');        
    });

    // For Admins Only
    Route::middleware('isAdmin')->group(function() {
        
        // Admin
        Route::prefix('admin')->group(function() {

            // Campus
            Route::prefix('campus')->group(function () {
                Route::get('/', 'CampusController@index')->name('campus.index');
                Route::get('/create', 'CampusController@create')->name('campus.create');
                Route::post('/create', 'CampusController@store')->name('campus.store');
                Route::get('/{id}', 'CampusController@show')->name('campus.show');
                Route::get('/{id}/edit', 'CampusController@edit')->name('campus.edit');
                Route::put('/{id}', 'CampusController@update')->name('campus.update');
                Route::delete('/{id}', 'CampusController@destroy')->name('campus.destroy');

                Route::post('/fetchCampus', 'CampusController@ajaxName')->name('campus.ajaxName');
                Route::post('/fetchCampuses', 'CampusController@ajaxNames')->name('campus.ajaxNames');
            });

            // Logs
            Route::prefix('logs')->group(function() {
            
                Route::prefix('campus')->group(function() {
                    Route::get('/', 'LogController@indexCampus')->name('logs.campus.index');
                    //Route::get('/{id}', 'LogController@showCampus')->name('logs.campus.show');
                });

                Route::prefix('category')->group(function() {
                    Route::get('/', 'LogController@indexCategory')->name('logs.category.index');
                    //Route::get('/{id}', 'LogController@showCategory')->name('logs.category.show');
                });

                Route::prefix('food')->group(function() {
                    Route::get('/', 'LogController@indexFood')->name('logs.food.index');
                    //Route::get('/{id}', 'LogController@showFood')->name('logs.food.show');
                });

                Route::prefix('menu')->group(function() {
                    Route::get('/', 'LogController@indexMenu')->name('logs.menu.index');
                    //Route::get('/{id}', 'LogController@showMenu')->name('logs.menu.show');
                });

                Route::prefix('period')->group(function() {
                    Route::get('/', 'LogController@indexPeriod')->name('logs.period.index');
                    //Route::get('/{id}', 'LogController@showMenu')->name('logs.menu.show');
                });

                Route::prefix('user')->group(function() {
                    Route::get('/', 'LogController@indexUser')->name('logs.user.index');
                    //Route::get('/{id}', 'LogController@showUser')->name('logs.user.show');
                });
            });

            // Periods
            Route::prefix('periods')->group(function() {
                Route::get('/', 'PeriodController@index')->name('period.index');
                Route::get('/create', 'PeriodController@create')->name('period.create');
                Route::post('/create', 'PeriodController@store')->name('period.store');
                Route::get('/{id}', 'PeriodController@show')->name('period.show');
                Route::get('/{id}/edit', 'PeriodController@edit')->name('period.edit');
                Route::put('/{id}', 'PeriodController@update')->name('period.update');
                Route::delete('/{id}', 'PeriodController@destroy')->name('period.destroy');
            });

            // Users
            Route::prefix('users')->group(function() {
                Route::get('/', 'UserController@index')->name('users.index');
                Route::get('/create', 'UserController@create')->name('users.create');
                Route::post('/create', 'UserController@store')->name('users.store');
                Route::get('/{id}', 'UserController@show')->name('users.show');
                Route::get('/{id}/edit', 'UserController@edit')->name('users.edit');
                Route::put('/{id}', 'UserController@update')->name('users.update');
                Route::delete('/{id}', 'UserController@destroy')->name('users.destroy');
            });
        });
    });

    // For Consessionaires Only
    Route::middleware('isConcessionaire')->group(function() {

    });
});



/*
    Route::prefix('category')->group(function() {
        Route::get('/', 'CategoriesController@index')->name('categories.index');
        Route::get('/create', 'CategoriesController@create')->name('categories.create');
        Route::post('/create', 'CategoriesController@store')->name('categories.store');
        Route::get('/{id}', 'CategoriesController@show')->name('categories.show');
        Route::get('/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
        Route::put('/{id}', 'CategoriesController@update')->name('categories.update');
        Route::delete('/{id}', 'CategoriesController@destroy')->name('categories.destroy');
    });

    // Period 
    //Categories Food, Menu, MenuItem, Period, Subscribers, User
*/

