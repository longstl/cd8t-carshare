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
        if(!$user->driving_license_number){
            return redirect()->route('updateLicense');
        }
        return view('web/create_ride');
    }
    public function store(){

    }

    public function find() {
        return view(''); // return ra view có chứa form find a ride
    }
}
