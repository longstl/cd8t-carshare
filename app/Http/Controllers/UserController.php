<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(){
        $user = User::all();
        return $user;
    }

    public function create(){
    }
    public function store(UserRequest $request){
        $user = new User();
        $user->fill($request->validated());
        $hashed_password = Hash::make($request['password']);
        $user->password =$hashed_password;
        $user->save();
        return $user;
    }
    public function update($id){
        $user = User::find($id);
        return $user;

    }
    public function save(UserRequest $request,$id){
        $user = User::find($id);
        $data = $request->validated();
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        $user->save();
        return $user;

    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return true;
}
    //
}
