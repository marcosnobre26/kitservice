<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\CondominiumController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::resource('condominiunsadm', 'CondominiumController');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('admin/condominiums', 'Admin\CondominiumController');
Route::resource('admin/kitnets', 'Admin\KitNetController');
Route::resource('admin/comercialrooms', 'Admin\ComercialRoomController');
Route::resource('admin/comercialpoints', 'Admin\CommercialPointController');
Route::resource('admin/about', 'Admin\AboutController');

//Route::view('/{path?}', 'app');
Route::get('/teste', function () {
    return 'Hello World';
});

Route::get('/{path?}', function () {
    return view('appp'); // or wherever your React app is bootstrapped.
})->where('path', '.*');


