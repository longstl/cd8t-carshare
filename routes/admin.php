<?php

use App\Http\Controllers\Admin\AdminModelController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminRequestController;
use App\Http\Controllers\Admin\AdminRideController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Web\FeedbackController;
use App\Http\Controllers\Web\RideController;
use Illuminate\Support\Facades\Route;

Route::prefix("car")->group(function (){
    Route::get('',[AdminModelController::class,'list'])->name('listCar');
    Route::get('create',[AdminModelController::class,'create'])->name('createCar');
    Route::post('create',[AdminModelController::class,'store'])->name('storeCar');
    Route::get('update/{id}',[AdminModelController::class,'update'])->name('updateCar');
    Route::post('update/{id}',[AdminModelController::class,'save'])->name('saveCar');
    Route::get('delete/{id}',[AdminModelController::class,'delete'])->name('deleteCar');
});

Route::prefix('user')->group(function (){
    Route::get('',[AdminUserController::class,'list'])->name('listUser');
    Route::get('show',[AdminUserController::class,'show'])->name('show_approve_drivers');
    Route::get('show/{id}',[AdminUserController::class,'set'])->name('set');
    Route::get('create',[AdminUserController::class,'create'])->name('createUser');
    Route::post('create',[AdminUserController::class,'store'])->name('storeUser');
    Route::get('update/{id}',[AdminUserController::class,'update'])->name('updateUser');
    Route::post('update/{id}',[AdminUserController::class,'save'])->name('saveUser');
    Route::get('delete/{id}',[AdminUserController::class,'delete'])->name('deleteUser');
});

Route::prefix("feedback")->group(function () {
    Route::get('', [FeedbackController::class, 'list'])->name('listFeedback');
    Route::get('delete/{id}', [FeedbackController::class, 'delete'])->name('deleteFeedback');
});
Route::prefix("ride")->group(function () {
    Route::get('', [AdminRideController::class, 'list'])->name('listRide');

});
Route::prefix("request")->group(function () {
    Route::get('', [AdminRequestController::class, 'list'])->name('listRequest');
});
