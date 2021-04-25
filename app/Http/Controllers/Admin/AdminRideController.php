<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;



class AdminRideController extends Controller
{
    public function list(){
        $ride = Ride::query()->with(['car', 'car.user'])->get();
        return view('admin/ride/list',[
            'ride'=>$ride
        ]);

    }
    public function create(){
    }
    public function store(){
    }
    public function update(){
    }
    public function save(){

    }
    public function delete(){
    }
    //
    //
}
