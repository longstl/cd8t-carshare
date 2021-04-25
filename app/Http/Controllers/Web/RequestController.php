<?php


namespace App\Http\Controllers\Web;


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
}
