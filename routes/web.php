<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\EntryController;
use App\Http\Controllers\Web\RideController;
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

Route::prefix('admin')->group(function (){
    require_once __DIR__ . '/admin.php';
});

Route::prefix('')->group(function(){
    Route::get('login',[EntryController::class,'login'])->name('loginForm');
    Route::post('login',[EntryController::class,'processLogin'])->name('loginUser');
    Route::get('register',[EntryController::class,'register'])->name('registerForm');
    Route::post('register',[EntryController::class,'processRegister'])->name('registerUser');
});

Route::get('createLicense',[UserController::class,'updateLicense'])->name('updateLicense');
Route::post('saveLicense',[UserController::class,'saveLicense'])->name('saveLicense');
Route::get('createRide',[RideController::class,'create'])->name('createRide');
Route::post('saveRide',[RideController::class,'store'])->name('saveRide');
