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

Route::get('/', 'AppController@index');

Route::prefix('api')->namespace('Api')->group(function () {
    // Controllers Within The "App\Http\Controllers\Api" Namespace
	Route::post('bookings/create', ['as' => 'bookings.create', 'uses' => 'BookingController@create']);
	Route::get('bookings/list', ['as' => 'bookings.list', 'uses' => 'BookingController@list']);
	Route::post('bookings/mark', ['as' => 'bookings.mark', 'uses' => 'BookingController@mark']);
    
});

