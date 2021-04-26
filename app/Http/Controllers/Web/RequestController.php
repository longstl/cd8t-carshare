<?php


namespace App\Http\Controllers\Web;


use App\Enums\RequestStatus;
use App\Enums\RideStatus;
use App\Http\Controllers\Controller;

use App\Http\Requests\RequestRequest;
use App\Models\Request;
use App\Models\Ride;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function create()
    {
       return view('web/find_ride');
    }
    public function store(RequestRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $new_request = new Request();
        $new_request->fill($data);
        $new_request->save();
        return redirect()->route('detailRequest', [$new_request->id]);
    }

    public function detail($id)
    {
        $data_request = Request::find($id);
        return view('web/request_detail',[
            'data_request'=>$data_request
        ]);
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

    public function cancel($id)
    {
        $request = Request::find($id);
        if ($request->ride_id) {
            $ride = $request->ride();
            if ($ride && $ride->status != RideStatus::COMPLETED && $ride->status != RideStatus::CANCELED) {
                $ride->status = RideStatus::CONFIRMED;
            }
            $ride->save();
        }
        $request->status = RequestStatus::CANCELED;
        $request->save();
        return redirect()->route('detailRequest', $id)->with('canceled', true);
    }
}
