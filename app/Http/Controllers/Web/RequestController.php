<?php


namespace App\Http\Controllers\Web;


use App\Enums\RequestStatus;
use App\Enums\RideStatus;
use App\Http\Requests\RequestRequest;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class RequestController
{
    public function store(RequestRequest $request)
    {
        $data = $request->validated();
//        $data['user_id'] = Auth::id();
        $new_request = new Request();
        $new_request->fill($data);
        $new_request->save();
        return $new_request;
    }

    public function list()
    {
        return Request::all();
    }

    public function book($id)
    {
        $request = Request::find($id);
        $ride = $request->ride();
        $request->status = RequestStatus::BOOKED;
        $ride->status = RideStatus::CONFIRMED;
        $ride->seats_available -= $request->seats_occupy;
        $request->save();
        $ride->save();
        return $request();
    }

    public function cancelMatch($id)
    {
        $request = Request::find($id);
        $ride = $request->ride();
        $request->status = RequestStatus::WAITING;
        $ride->status = RideStatus::CONFIRMED;
    }
}
