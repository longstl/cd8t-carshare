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
    Route::get('create-license', [UserController::class, 'updateLicense'])->name('updateLicense');
    Route::post('save-license', [UserController::class, 'saveLicense'])->name('saveLicense');
    Route::get('create-ride', [RideController::class, 'create'])->name('createRide');
    Route::post('save-ride', [RideController::class, 'store'])->name('storeRide');
});
