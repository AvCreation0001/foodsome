<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RestaurantController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//UserController
Route::controller(UserController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('verify_otp','verify_otp');
});

//LocationController
Route::controller(LocationController::class)->group(function () {
    Route::get('alllocations','allLocations');
    Route::post('login','login');
    Route::post('searchLocation','searchLocation');
});
//UserController
Route::controller(UserController::class)->group(function () {
    Route::post('login','login');
});
//RestaurantController
Route::controller(RestaurantController::class)->group(function (){
    Route::post('locationwiseRestaurant','locationwiseRestaurant');
});