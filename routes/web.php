<?php

use App\Http\Controllers\CarController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('Admin/car/list');
});

Route::prefix("car")->group(function (){
    Route::get('',[CarController::class,'list'])->name('listCar');
    Route::get('create',[CarController::class,'create'])->name('createCar');
    Route::post('create',[CarController::class,'store'])->name('storeCar');
    Route::get('update/{id}',[CarController::class,'update'])->name('updateCar');
    Route::post('update/{id}',[CarController::class,'save']);
    Route::get('delete/{id}',[CarController::class,'delete'])->name('deleteCar');
});

