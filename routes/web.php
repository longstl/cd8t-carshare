<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\EntryController;
use App\Http\Controllers\Web\RideController;
use App\Http\Controllers\Web\UserController;
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

Route::prefix('admin')->group(function () {
    require_once __DIR__ . '/admin.php';
});


Route::get('login',[EntryController::class,'login'])->name('login');
Route::post('login',[EntryController::class,'processLogin'])->name('loginUser');
Route::get('register',[EntryController::class,'register'])->name('registerForm');
Route::post('register',[EntryController::class,'processRegister'])->name('registerUser');
Route::get('logout',[EntryController::class,'logout'])->name('logoutUser');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/map', function () {return view('map');});
Route::get('/test', function () {return view('Client/index');});

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('create-license',[UserController::class,'updateLicense'])->name('updateLicense');
    Route::post('save-license',[UserController::class,'saveLicense'])->name('saveLicense');
    Route::get('create-ride',[RideController::class,'create'])->name('createRide');
    Route::post('save-ride',[RideController::class,'store'])->name('saveRide');
});



