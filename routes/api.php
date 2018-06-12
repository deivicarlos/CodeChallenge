<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', 'api\UserController');

Route::resource('reservations', 'api\ReservationController');

Route::delete('reservations/hosts/{id}/guests', 'api\ReservationController@destroy');

Route::get('users/{id}/guests','api\ReservationController@show');

Route::get('users/recommendations/{id}', 'api\UserController@recommendations');
