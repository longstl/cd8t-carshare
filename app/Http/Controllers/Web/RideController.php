<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RideRequest;
use App\Models\Ride;
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

    public function store(RideRequest $request)
    {
        $data = $request->validated();
        $obj = json_decode(getDistance($data['origin_address'], $data['destination_address']), true);
        $map_info = $obj['rows'][0]['elements'][0];
        $data['distance'] = $map_info['distance']['value'];
//        $origin = getInfoGeoMap($data['origin_address']);
//        return $origin;
        $data['user_id'] = Auth::id();
        $ride = new Ride();
        $ride->fill($data);
        $ride->save();
        return $ride;
    }

    public function list()
    {
        return Ride::all();
    }

    public function find()
    {
        return view(''); // return ra view có chứa form find a ride
    }
}
