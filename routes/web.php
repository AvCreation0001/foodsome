<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('dummy', 'dummy');

////////////////////////////////////ADMIN-PANEL/////////////////////////////////////////////////////
Route::view('layout','admin.layout');
Route::view('dashboard','admin.dashboard');
Route::view('addlocation','admin.addlocation');
Route::view('viewlocation','admin.viewlocation');

/////////////////////////////////////////FUNCTION START FROM HERE///////////////////////////////////

//LocationController
Route::controller(LocationController::class)->group(function () {
    Route::post('addlocation', 'addLocation');
    Route::get('viewlocation','viewLocations');
});