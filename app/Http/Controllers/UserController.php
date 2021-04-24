<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(Request $request){
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $search =  $request->query('search');
        if($search!=""){
            $listUser = User::where(function ($query) use ($search){
                $query->where('username', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            })
                ->paginate($limit);
            $listUser->appends([
                'search' => $search,
            ]);
        }
        else{
            $listUser = User::paginate($limit);
        }
        return view('Admin/user/list',['list_user' => $listUser,
            'limit' => $limit]);
    }

    public function create(){
        return view('Admin/user/form',['data_user' => null]);
    }
    public function store(UserRequest $request){
        $user = new User();
        $user->fill($request->validated());
        $hashed_password = Hash::make($request['password']);
        $user->password =$hashed_password;
        $user->save();
        return redirect()->route('listUser')->with(['status' => 'create admin success','user' => $user->username]);
    }
    public function update($id){
        $user = User::find($id);
        return view('Admin/user/form',['data_user'=>$user]);

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
        return redirect()->route('listUser')->with(['status' => 'Update admin success','user'=>$user->username]);;

    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('listUser')->with(['status' => 'Delete admin success','user'=>$user->username]);
}
    //
}
