<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix("user")->group(function(){
    Route::get('',[UserController::class,'list']);
    Route::post('',[UserController::class,'store']);
    Route::get('{id}',[UserController::class,'update']);
    Route::put('{id}',[UserController::class,'save']);
    Route::delete('{id}',[UserController::class,'delete']);
});