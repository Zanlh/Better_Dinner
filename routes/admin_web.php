<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->name('admin.')->namespace('Backend')->middleware('auth:admin_user')->group(function(){
    Route::get('/', 'PageController@home')->name('home');

    Route::resource('admin-user','AdminUserController');

    Route::get('user/datatable/ssd','UserController@ssd');
    Route::resource('user','UserController');

    Route::get('restaurant/datatable/ssd','RestaurantController@ssd');
    Route::resource('restaurant','RestaurantController');

    // Route::get('admin/restaurant/menu-page/{id}','RestaurantController@menuPage')->name('menu-page');

    Route::get('menu/datatable/ssd','MenuController@ssd');
    Route::resource('menu','MenuController');


  
});
