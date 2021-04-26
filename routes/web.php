<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\EntryController;
use App\Http\Controllers\Web\RequestController;
use App\Http\Controllers\Web\RideController;
use App\Http\Controllers\Web\UserController;
use App\Models\Model;
use Illuminate\Support\Facades\Route;

Route::get('/profile',function (){
    return view('web/profile');
});

Route::get('/driving',function (){
    return view('web/driving_license');
});
Route::prefix('admin')->group(function () {
    require_once __DIR__ . '/admin.php';
});

Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('login',[EntryController::class,'login'])->name('login');
Route::post('login',[EntryController::class,'processLogin'])->name('loginUser');
Route::get('register',[EntryController::class,'register'])->name('registerForm');
Route::post('register',[EntryController::class,'processRegister'])->name('registerUser');
Route::get('logout',[EntryController::class,'logout'])->name('logoutUser');

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('create-license',[UserController::class,'updateLicense'])->name('updateLicense');
    Route::post('save-license',[UserController::class,'saveLicense'])->name('saveLicense');
    Route::get('create-car',[UserController::class,'createCar'])->name('updateCar');
    Route::post('save-car',[UserController::class,'saveCar'])->name('saveCar');
    Route::get('create-ride',[RideController::class,'create'])->name('createRide');
    Route::post('create-ride',[RideController::class,'store'])->name('storeRide');
    Route::get('detail/{id}', [RideController::class, 'detail'])->name('detail-ride');

});
Route::prefix('request')->group(function() {
    Route::get('', [RequestController::class, 'list']);
    Route::get('create', [RequestController::class, 'create']);
    Route::post('create', [RequestController::class, 'store']);
    Route::get('detail/{id}', [RequestController::class, 'detail'])->name('request_detail');
});
Route::get('/profile',function (){
    return view('web/update_license');
});
Route::get('/ride-detail',function (){
    $model = Model::all();
    return view('web/update_car',['listModel' => $model]);
});
Route::get('/test',function (){
    return view('web/user_profile');
});
});
