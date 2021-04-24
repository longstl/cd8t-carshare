<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function list(){
        $car = Car::all();
        return $car;

    }
    public function create(){
    }
    public function store(CarRequest $request){
        $car = new Car();
        $car->fill($request->validated());
        $car->save();
        return $car;
    }
    public function update($id){
        $car = Car::find($id);
        return $car;
    }
    public function save(CarRequest $request,$id){
        $car = Car::find($id);
        $car->update($request->validated());
        $car->save();
        return $car;
    }
    public function delete($id){
        $car = Car::find($id);
        $car->delete();
        return true;
    }
    //
}
