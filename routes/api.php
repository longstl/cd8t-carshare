<?php

use App\Http\Controllers\Admin\AdminRideController;
use App\Http\Controllers\Web\RequestController;
use App\Http\Controllers\Web\RideController;
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

Route::prefix('ride')->group(function() {
    Route::get('', [RideController::class, 'list']);
    Route::post('', [RideController::class, 'store']);
});



Route::get('admin/ride/match/{id}', [AdminRideController::class, 'findMatch']);
