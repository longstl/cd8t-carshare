<?php

use Illuminate\Http\Request;

function lib_assets($path) {
    return asset('libs/'.$path);
}

function getDistance($start, $end)
{
    $obj = json_decode(\GoogleMaps::load('distancematrix')->setParam([
        'origins' => $start,
        'destinations' => $end,
        'key' => env('GOOGLE_MAP_API_KEY'),
        'units' => 'metric'
    ])->get(), true);
    return $obj['rows'][0]['elements'][0];
}

function getInfoGeoMap($address)
{
    return \GoogleMaps::load('geocoding')->setParam([
        'address' => $address,
        'key' => env('GOOGLE_MAP_API_KEY')
    ])->get();
}

function addMinutes($original, $added_minutes)
{
    try {
        $time = new DateTime($original);
        $time->modify('+' . ceil($added_minutes) . ' minutes');
        return $time->format('Y-m-d H:i:s');
    } catch (\Exception $e) {
    }
}
