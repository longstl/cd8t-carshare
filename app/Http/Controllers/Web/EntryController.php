<?php

namespace App\Http\Controllers\Web;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function register()
    {
        return view('Client/entry');
    }
    public function login()
    {
        return view('Client/entry');
    }

    public function processRegister(UserRequest $request)
    {
        $data = $request->validated();
        $data['role'] = Role::USER;
        $user = new User();
        $user->fill($data);
        $user->save();
        return redirect()->route('loginUser');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
