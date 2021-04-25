<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::prefix("admin/car")->group(function () {
    Route::get('', [CarController::class, 'list'])->name('listCar');
    Route::get('create', [CarController::class, 'create'])->name('createCar');
    Route::post('create', [CarController::class, 'store'])->name('storeCar');
    Route::get('update/{id}', [CarController::class, 'update'])->name('updateCar');
    Route::post('update/{id}', [CarController::class, 'save'])->name('saveCar');
    Route::get('delete/{id}', [CarController::class, 'delete'])->name('deleteCar');
});

Route::prefix("admin/feedback")->group(function () {
    Route::get('', [FeedbackController::class, 'list'])->name('listFeedback');
    Route::get('delete/{id}', [FeedbackController::class, 'delete'])->name('deleteFeedback');
});
    Route::prefix('admin/user')->group(function () {
        Route::get('', [UserController::class, 'list'])->name('listUser');
        Route::get('create', [UserController::class, 'create'])->name('createUser');
        Route::post('create', [UserController::class, 'store'])->name('storeUser');
        Route::get('update/{id}', [UserController::class, 'update'])->name('updateUser');
        Route::post('update/{id}', [UserController::class, 'save'])->name('saveUser');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('deleteUser');
    });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/map', function () {return view('map');});
Route::get('/test', function () {return view('Client/index');});
