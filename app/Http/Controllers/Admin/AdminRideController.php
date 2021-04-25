<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Request;
use App\Models\Ride;


class AdminRideController extends Controller
{
    public function list()
    {
        $list_feedback = Feedback::query()->with(['user'])->paginate(10)->get();
        return view('admin/feedback/list', [
            'list_feedback' => $list_feedback,
            'title' => 'List Feedback'
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

    public function delete($id)
    {
        $feedback = Feedback::find($id)->with(['user'])->get();
        $feedback->delete();
        return redirect()->route('listFeedback')->with(['status' => 'delete feedback success', 'feedback' => $feedback->user->name]);
    }

    public function findMatch($id)
    {
        $ride = Ride::find($id);
        $requests = Request::all();
        $matched_requests = [];
        foreach ($requests as $request) {
            $request['destination_difference'] = getDistance($request['destination_address'], $ride['destination_address'])['distance']['value'];
            if ($request['destination_difference'] > 1000) {
                continue;
            }
            $request['pickup_time'] = getDistance($ride['origin_address'], $request['pickup_address'])['duration']['value'];
            array_push($matched_requests, $request);
        }
        return $matched_requests;
    }

    public function match($id)
    {
        
    }
}
