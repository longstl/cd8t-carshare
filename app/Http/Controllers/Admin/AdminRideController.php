<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RequestStatus;
use App\Enums\RideStatus;
use App\Http\Controllers\Controller;
use App\Models\Ride;
use Carbon\Carbon;


class AdminRideController extends Controller
{
    public function list()
    {
        $rides = Ride::query()->with(['car', 'car.user'])->get();
        return view('admin/ride/list', [
            'rides' => $rides
        ]);
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function update()
    {
    }

    public function save()
    {

    }

    public function cancel($id)
    {

    }

    public function findMatch($id)
    {
        $ride = Ride::find($id);
        $travel_date = date("Y-m-d", strtotime($ride['travel_start_time']));
        $requests = \App\Models\Request::query()
            ->where('status', RequestStatus::WAITING)
            ->where('desired_pickup_time', '>', Carbon::now())
            ->where('seats_occupy', '<=', $ride['seats_available'])
            ->whereDate('desired_pickup_time', $travel_date)
            ->get();
        $matched_requests = [];
        foreach ($requests as $request) {
            $request['destination_difference'] = getDistance($request['destination_address'], $ride['destination_address'])['distance']['value'];
            if ($request['destination_difference'] > 5000) {
                continue;
            }
            $request['destination_difference_text'] = convertMetersToText($request['destination_difference']);
            $origin_compare = getDistance($ride['origin_address'], $request['pickup_address']);
            $request['origin_difference'] = $origin_compare['distance']['value'];
            $request['origin_difference_text'] = convertMetersToText($request['origin_difference']);
            $request['duration'] = $origin_compare['duration']['value'];
            $request['pickup_time'] = addMinutes($ride['travel_start_time'], $request['duration'] / 60);
            $request['pickup_time_difference'] = abs(strtotime($request['pickup_time']) - strtotime($request['desired_pickup_time']));
            $request['pickup_time_difference_text'] = convertToHoursMins($request['pickup_time_difference'] / 60);
            array_push($matched_requests, $request);
        }
        usort($matched_requests, function ($a, $b) {
            $a_sort_value = $a->origin_difference / 1000 + $a->destination_difference/1000 + $a->pickup_time_difference / 60 / 60;
            $b_sort_value = $b->origin_difference / 1000 + $b->destination_difference/1000 + $b->pickup_time_difference / 60 / 60;
            if ($a_sort_value == $b_sort_value) {
                return 0;
            }
            return ($a_sort_value < $b_sort_value) ? -1 : 1;
        });
        return view('admin/ride/matches', [
            'requests' => $matched_requests,
            'ride' => $ride,
        ]);
    }

    public function setMatch($ride_id, $request_id, $duration)
    {
        $ride = Ride::find($ride_id);
        $request = \App\Models\Request::find($request_id);
        $request->status = RequestStatus::MATCHED;
        $request->ride_id = $ride_id;
        $request->price = $ride->price_total;
        try {
            $time = addMinutes($ride['travel_start_time'], $duration);
            $request->pickup_time = $time;
        } catch (\Exception $e) {
        }
        $request->save();
        $ride->status = RideStatus::MATCHED;
        $ride->save();
        return redirect()->route('listRide')->with('success', 'Ride '.$ride_id.' matched!');
    }
}
