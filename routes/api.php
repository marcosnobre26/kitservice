<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CondominiumController;
use App\Http\Controllers\KitNetController;
use App\Http\Controllers\CommercialRoomController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/players', 'PlayerController@index');
Route::get('/players/{id}', 'PlayerController@show');
Route::post('/players', 'PlayerController@store');
Route::post('/players/{id}/answers', 'PlayerController@answer');
Route::delete('/players/{id}', 'PlayerController@delete');
Route::delete('/players/{id}/answers', 'PlayerController@resetAnswers');*/

Route::get('/condominiums', 'CondominiumController@index');
Route::post('/condominium', 'CondominiumController@store');
Route::get('/condominium/{id}', 'CondominiumController@show');
Route::delete('/condominium/{id}', 'CondominiumController@destroy');
Route::put('/condominium/{id}', 'CondominiumController@update');
Route::get('/condominium/{id}/kitnets/', 'CondominiumController@getForCondominium');

Route::get('/kitnets', 'KitNetController@index');
Route::post('/kitnet', 'KitNetController@store');
Route::get('/kitnet/{id}', 'KitNetController@show');
Route::delete('/kitnet/{id}', 'KitNetController@destroy');
Route::put('/kitnet/{id}', 'KitNetController@update');

Route::get('/coomercial-rooms', 'CommercialRoomController@index');
Route::post('/coomercial-room', 'CommercialRoomController@store');
Route::get('/coomercial-room/{id}', 'CommercialRoomController@show');
Route::delete('/coomercial-room/{id}', 'CommercialRoomController@destroy');
Route::put('/coomercial-room/{id}', 'CommercialRoomController@update');
