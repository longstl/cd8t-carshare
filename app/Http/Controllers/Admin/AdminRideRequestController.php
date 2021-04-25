<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRideRequestController extends Controller
{

    public function getGeoLocation(Request $request)
    {
        $start = $request['start'];
        $end = $request['end'];
        return response()->json(\GoogleMaps::load('distancematrix')->setParam([
            'origins' => $start,
            'destinations' => $end,
            'key' => env('GOOGLE_MAP_API_KEY'),
            'units' => 'metric'
        ])->get());
    }

  

}
