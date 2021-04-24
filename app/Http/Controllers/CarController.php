<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function list()
    {
        $list_car = Car::all();
        return view('/Admin/car/list', [
            'list_car' => $list_car,
            'title' => 'List Car'
        ]);
    }

    public function create()
    {
        return view('/Admin/car/form', [
            'data_car' => null
        ]);
    }

    public function store(CarRequest $request)
    {
        $car = new Car();
        $car->fill($request->validated());
        $car->save();
        return redirect()->route('listCar')->with(['status' => 'create car success', 'car' => $car->name]);
    }

    public function update($id)
    {
        $data_car = Car::find($id);

        return view('/Admin/car/form', [
            'data_car' => $data_car,
            'title' => 'Update Car'
        ]);
    }

    public function save(CarRequest $request, $id)
    {
        $car = Car::find($id);
        $car->update($request->validated());
        $car->save();
        return redirect()->route('listCar')->with(['status' => 'Update car success', 'car' => $car->name]);

    }

    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->route('listCar')->with(['status' => 'delete car success', 'car' => $car->name]);
    }
    //
}
