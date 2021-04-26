<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Requests\UpdateLicenseRequest;
use App\Models\Car;
use App\Models\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateLicense(){
        return view('web/update_license');
    }
    public function profile(){
        return view('web/user_profile');
    }

    public function saveLicense(UpdateLicenseRequest $request){
        $user = User::find(Auth::id());
        $data = $request->validated();
        $user->update($data);
        $user->save();
        return redirect()->route('createRide');
    }
    public function createCar(){
        $model = Model::all();
        return view('web/create_car',['listModel' => $model]);
    }
    public function saveCar(CarRequest $request){
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $car = new Car();
        $car->fill($data);
        $car->save();
        return redirect()->route('createRide');
    }
}
