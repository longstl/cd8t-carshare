<?php

use App\Http\Controllers\CarController;
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

Route::get('/', function () {
    return view('Admin/user/form');
});
Route::prefix('admin/user')->group(function (){
    Route::get('',[UserController::class,'list'])->name('listUser');
    Route::get('create',[UserController::class,'create'])->name('createUser');
    Route::post('create',[UserController::class,'store'])->name('storeUser');
    Route::get('update/{id}',[UserController::class,'update'])->name('updateUser');
    Route::post('update/{id}',[UserController::class,'save'])->name('saveUser');
    Route::get('delete/{id}',[UserController::class,'delete'])->name('deleteUser');
});

