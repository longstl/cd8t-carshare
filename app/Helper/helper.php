<?php

use Illuminate\Http\Request;

function lib_assets($path) {
    return asset('libs/'.$path);
}

function getDistance($start, $end)
{
    return \GoogleMaps::load('distancematrix')->setParam([
        'origins' => $start,
        'destinations' => $end,
        'key' => env('GOOGLE_MAP_API_KEY'),
        'units' => 'metric'
    ])->get();
}

function getInfoGeoMap($address)
{
    return \GoogleMaps::load('geocoding')->setParam([
        'address' => $address,
        'key' => env('GOOGLE_MAP_API_KEY')
    ])->get();
}
