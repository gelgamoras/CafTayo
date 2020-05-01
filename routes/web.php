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


//Route::get('/', function () { return view('welcome'); });

Route::get('/', 'GuestController@landingPage')->name('home');

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
        Route::get('/profile', 'DashboardController@editprofile')->name('dashboard.profile.edit');
        Route::put('/profile', 'DashboardController@updateprofile')->name('dashboard.profile.update');
        Route::get('/changepassword', 'DashboardController@editpassword')->name('dashboard.password.edit');
        Route::put('/changepassword', 'DashboardController@updatepassword')->name('dashboard.password.update');
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
                Route::get('/{campus}', 'CampusController@show')->name('campus.show');
                Route::get('/{campus}/edit', 'CampusController@edit')->name('campus.edit');
                Route::put('/{campus}', 'CampusController@update')->name('campus.update');
                Route::delete('/{campus}', 'CampusController@destroy')->name('campus.destroy');

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
                Route::put('/', 'PeriodController@updatePeriods')->name('periods.update');
                Route::get('/create', 'PeriodController@create')->name('period.create');
                Route::post('/create', 'PeriodController@store')->name('period.store');
                Route::get('/{period}', 'PeriodController@show')->name('period.show');
                Route::get('/{period}/edit', 'PeriodController@edit')->name('period.edit');
                Route::put('/{period}', 'PeriodController@update')->name('period.update');
                Route::delete('/{period}', 'PeriodController@destroy')->name('period.destroy');
            });

            // Users
            Route::prefix('users')->group(function() {
                Route::get('/', 'UserController@index')->name('users.index');
                Route::get('/create', 'UserController@create')->name('users.create');
                Route::post('/create', 'UserController@store')->name('users.store');
                Route::get('/{user}', 'UserController@show')->name('users.show');
                Route::get('/{user}/edit', 'UserController@edit')->name('users.edit');
                Route::put('/{user}', 'UserController@update')->name('users.update');
                Route::delete('/{user}', 'UserController@destroy')->name('users.destroy');
            });
        });
    });

    //My Campuses 
    Route::get('/manage', 'DashboardController@myCampuses')->name('dashboard.mycampuses'); 

    // For Consessionaires Only
    Route::middleware('canManage')->group(function() {
        Route::prefix('manage/{campus}')->group(function() {

            //Category
            Route::prefix('category')->group(function() {
                Route::get('/', 'CategoriesController@index')->name('categories.index');
                Route::get('/create', 'CategoriesController@create')->name('categories.create');
                Route::post('/create', 'CategoriesController@store')->name('categories.store');
                Route::get('/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
                Route::put('/{category}', 'CategoriesController@update')->name('categories.update');
                Route::delete('/{category}', 'CategoriesController@destroy')->name('categories.destroy');
            });

            //Food 
            Route::prefix('food')->group(function() {
                Route::get('/', 'FoodController@index')->name('food.index'); 
                Route::get('/create', 'FoodController@create')->name('food.create'); 
                Route::post('/create', 'FoodController@store')->name('food.store'); 
                Route::get('/{food}', 'FoodController@show')->name('food.show');
                Route::get('/{food}/edit', 'FoodController@edit')->name('food.edit');
                Route::put('/{food}', 'FoodController@update')->name('food.update');
                Route::delete('/{food}', 'FoodController@destroy')->name('food.destroy');
            });

            //Menu
            Route::prefix('menu')->group(function() {
                Route::get('/', 'MenuController@index')->name('menu.index'); 
                Route::get('/create', 'MenuController@create')->name('menu.create'); 
                Route::post('/create', 'MenuController@store')->name('menu.store'); 
                Route::get('/{menu}', 'MenuController@show')->name('menu.show');
                Route::get('/{menu}/edit', 'MenuController@edit')->name('menu.edit');
                Route::put('/{menu}', 'MenuController@update')->name('menu.update');
                Route::delete('/{menu}', 'MenuController@destroy')->name('menu.destroy');
            });

        });
    });
});