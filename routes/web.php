<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
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

Route::get('/', function () {
    return view('getCity');
});
Route::post('getCityLatLong',[WeatherController::class,'getCityLatLong'])->name('getCityLatLong');
Route::get('getReport/{city}',[WeatherController::class,'getReport'])->name('getReport');