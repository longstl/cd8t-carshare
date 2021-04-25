<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Requests\UpdateLicenseRequest;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateLicense(){
        return view('Client/update_license');
    }

    public function saveLicense(UpdateLicenseRequest $request){
        $user = User::find(Auth::user()->id);
        $data = $request->validated();
        $user->update($data);
        $user->save();
        return redirect()->route('createRide');
    }
    public function updateCar(){
        return view('Client/updateCar');
    }
    public function saveCar(CarRequest $request){
        $car = new Car();
        $car->fill($request->validated());
        $car->save();
        return $car;
    }
}
