<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RequestStatus;
use App\Enums\RideStatus;
use App\Http\Controllers\Controller;
use App\Models\Ride;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


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

    public function findMatch($id)
    {
        $ride = Ride::find($id);
        $requests = Request::query()
            ->where('status', RequestStatus::WAITING)
            ->where('desired_pickup_time', '<', Carbon::now())
            ->where('seats_occupy', '<=', $ride['seats_available'])
            ->orderBy('desired_pickup_time')
            ->get();
        $matched_requests = [];
        foreach ($requests as $request) {
            $request['destination_difference'] = getDistance($request['destination_address'], $ride['destination_address'])['distance']['value'];
            if ($request['destination_difference'] > 1000) {
                continue;
            }
            $request['duration'] = getDistance($ride['origin_address'], $request['pickup_address'])['duration']['value'];
            array_push($matched_requests, $request);
        }
        return $matched_requests;
    }

    public function match($ride_id, $request_id, $duration)
    {
        $ride = Ride::find($ride_id);
        $request = Request::find($request_id);
        $request->status = RequestStatus::MATCHED;
        $request->ride_id = $ride_id;
        try {
            $time = new DateTime($ride['travel_start_time']);
            $time->modify('+' . $duration . ' minutes');
            $request->pickup_time = $time;
        } catch (\Exception $e) {
        }
        $request->save();
        $ride->status = RideStatus::MATCHED;
        $ride->save();
        return $ride;
    }

    public function delete()
    {
    }
    //
    //
}
