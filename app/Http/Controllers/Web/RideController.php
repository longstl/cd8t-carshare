<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function create(){
        if(!Auth::user()->driving_license_number){
            redirect()->route('updateLicense');
        }
        return "Update success";
    }
    public function store(){

    }
    //
}
