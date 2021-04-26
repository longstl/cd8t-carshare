<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\Http\Request as FormRequest;

class AdminRequestController extends Controller
{
    public function list()
    {
        $list_request = Request::query()->with(['user','ride'])->get();;
        return view('Admin/request/list',[
            'list_request'=>$list_request
        ]);
    }
}
