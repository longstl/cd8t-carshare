<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function create(){
        $user = User::find(Auth::id());
        $userCar = User::with('userCars')->find(Auth::id());
        if(!$user->driving_license_number){
            return redirect()->route('updateLicense');
        }if (!$userCar->car_id){
            return redirect()->route('updateCar');
        }
        return "hello";
    }
    public function store(){

    }
    //
}
