<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use App\Models\Model;
use Illuminate\Http\Request;

class AdminModelController extends Controller

{
    public function list()
    {
        $list_car = Model::all();
        return view('/admin/car/list', [
            'list_car' => $list_car,
            'title' => 'List Model'
        ]);
    }

    public function create()
    {
        return view('/admin/car/form', [
            'data_car' => null
        ]);
    }

    public function store(ModelRequest $request)
    {
        $model = new Model();
        $model->fill($request->validated());
        $model->save();
        return redirect()->route('listCar')->with(['status' => 'create car success', 'car' => $model->name]);
    }

    public function update($id)
    {
        $model = Model::find($id);
        return view('/admin/car/form', [
            'data_car' => $model,
            'title' => 'Update Model'
        ]);
    }

    public function save(ModelRequest $request, $id)
    {
        $model = Model::find($id);
        $model->update($request->validated());
        $model->save();
        return redirect()->route('listCar')->with(['status' => 'Update car success', 'car' => $model->name]);

    }

    public function delete($id)
    {
        $model = Model::find($id);
        $model->delete();
        return redirect()->route('listCar')->with(['status' => 'delete car success', 'car' => $model->name]);
    }
}
