<?php

use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::prefix("car")->group(function (){
    Route::get('',[AdminCarController::class,'list'])->name('listCar');
    Route::get('create',[AdminCarController::class,'create'])->name('createCar');
    Route::post('create',[AdminCarController::class,'store'])->name('storeCar');
    Route::get('update/{id}',[AdminCarController::class,'update'])->name('updateCar');
    Route::post('update/{id}',[AdminCarController::class,'save'])->name('saveCar');
    Route::get('delete/{id}',[AdminCarController::class,'delete'])->name('deleteCar');
});
Route::prefix('user')->group(function (){
    Route::get('',[AdminUserController::class,'list'])->name('listUser');
    Route::get('create',[AdminUserController::class,'create'])->name('createUser');
    Route::post('create',[AdminUserController::class,'store'])->name('storeUser');
    Route::get('update/{id}',[AdminUserController::class,'update'])->name('updateUser');
    Route::post('update/{id}',[AdminUserController::class,'save'])->name('saveUser');
    Route::get('delete/{id}',[AdminUserController::class,'delete'])->name('deleteUser');
});
Route::prefix("feedback")->group(function (){
    Route::get('',[AdminFeedbackController::class,'list'])->name('listFeedback');
    Route::get('delete/{id}',[AdminFeedbackController::class,'delete'])->name('deleteFeedback');
});
