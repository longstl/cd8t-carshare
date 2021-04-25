<?php

namespace App\Http\Controllers;

use App\Http\Requests\RideRequest;
use Illuminate\Http\Request;

class RideRequestController extends Controller
{
    public function list()
    {
        $request = RideRequest::query()->with(['user','ride'])->paginate(10)->get();
        return view('', [
            'request' => $request
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

    public function delete()
    {
    }
    //
}
