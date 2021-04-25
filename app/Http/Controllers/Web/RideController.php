<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Request;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function create()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $car = Car::query()->where('user_id', $user_id)->first();
        if(!$user->driving_license_number){
            return redirect()->route('updateLicense');
        }if (!$car){
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
