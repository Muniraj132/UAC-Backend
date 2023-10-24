<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

Route::Post('/store/contact',[ApiController::class,'storecontact']);
Route::get('/get/post/{id}',[ApiController::class,'getpostdata']);
Route::get('/get/slider',[ApiController::class,'getsliderimages']);
Route::get('/get/Newsletter',[ApiController::class,'getnewsletter']);
Route::get('/get/Pages',[ApiController::class,'getpage']);
Route::get('/get/slidebar',[ApiController::class,'getslidebar']);
Route::get('get/gallery_images',[ApiController::class,'getGalleryimages']);