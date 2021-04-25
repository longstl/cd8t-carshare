<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function create()
    {
        $user = User::find(Auth::id());
        $userCar = User::with('userCars')->find(Auth::id());
        if(!$user->driving_license_number){
            return redirect()->route('updateLicense');
        }if (!$userCar->car_id){
            return redirect()->route('updateCar');
        }
        return view('web/create_ride');
    }

    public function store()
    {

    }

    public function list()
    {
        return Request::all();
    }

    public function find()
    {
        return view(''); // return ra view có chứa form find a ride
    }
}
