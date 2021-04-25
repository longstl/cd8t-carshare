<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;


class AdminRideController extends Controller
{
    public function list(){
        $list_feedback = Feedback::query()->with(['user'])->paginate(10)->get();
        return view('admin/feedback/list',[
            'list_feedback'=>$list_feedback,
            'title'=>'List Feedback'
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
    public function delete($id){
        $feedback = Feedback::find($id)->with(['user'])->get();
        $feedback->delete();
        return redirect()->route('listFeedback')->with(['status' => 'delete feedback success', 'feedback' => $feedback->user->name]);
    }
    //
}
