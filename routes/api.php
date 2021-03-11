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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::get('paises', 'GeneralController@api_paises')->name('api_paises');
Route::get('provincias', 'GeneralController@api_provincias')->name('api_provincias');
Route::get('localidades/{id}', 'GeneralController@api_localidades')->name('api_localidades');