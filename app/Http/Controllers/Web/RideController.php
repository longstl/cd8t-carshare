<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RideRequest;
use App\Models\Car;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function create()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $cars = Car::query()->where('user_id', $user_id)->with('model')->get();
        if(!$user->driving_license_number){
            return redirect()->route('updateLicense');
        }if (!sizeof($cars)){
            return redirect()->route('updateCar');
        }
        return view('web/create_ride',['cars'=>$cars]);
    }

    public function store(RideRequest $request)
    {
        $data = $request->validated();
        $map_info = getDistance($data['origin_address'], $data['destination_address']);
        $data['distance'] = $map_info['distance']['value'];
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
