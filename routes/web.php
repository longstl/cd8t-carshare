<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\EntryController;
use App\Http\Controllers\Web\RequestController;
use App\Http\Controllers\Web\RideController;
use App\Http\Controllers\Web\UserController;
use App\Models\Model;
use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
    return view('web/profile');
});

Route::get('/driving', function () {
    return view('web/driving_license');
});
Route::prefix('admin')->group(function () {
    require_once __DIR__ . '/admin.php';
});

Route::get('/', [HomeController::class, 'index'])->name('index');


Route::get('login', [EntryController::class, 'login'])->name('login');
Route::post('login', [EntryController::class, 'processLogin'])->name('loginUser');
Route::get('register', [EntryController::class, 'register'])->name('registerForm');
Route::post('register', [EntryController::class, 'processRegister'])->name('registerUser');
Route::get('logout', [EntryController::class, 'logout'])->name('logoutUser');

Route::prefix('user')->middleware('auth')->group(function () {
  Route::get('profile', [UserController::class,'profile'])->name('profile_user');
  Route::get('update', [UserController::class,'update_profile'])->name('update_profile');
  Route::post('update', [UserController::class,'saveuser'])->name('saveuser');
  Route::get('delete', [UserController::class,'delete_user'])->name('delete_user');
    Route::prefix('license')->group(function () {
        Route::get('create', [UserController::class, 'updateLicense'])->name('updateLicense');
        Route::post('save', [UserController::class, 'saveLicense'])->name('saveLicense');
    });
    Route::prefix('car')->group(function () {
        Route::get('create', [UserController::class, 'createCar'])->name('updateCar');
        Route::post('save', [UserController::class, 'saveCar'])->name('saveCar');
    });
    Route::prefix('ride')->group(function () {
        Route::get('create', [RideController::class, 'create'])->name('createRide');
        Route::post('store', [RideController::class, 'store'])->name('storeRide');
        Route::get('detail/{id}', [RideController::class, 'detail'])->name('detail-ride');
    });
    Route::prefix('request')->group(function () {
        Route::get('create', [RequestController::class, 'create'])->name('createRequest');
        Route::post('create', [RequestController::class, 'store'])->name('storeRequest');
        Route::get('detail/{id}', [RequestController::class, 'detail'])->name('request_detail');
    });
});

Route::get('/profile', function () {
    return view('web/user_profile');
});
