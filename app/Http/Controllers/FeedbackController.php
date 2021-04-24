<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
    public function list(){
        $list_feedback = Feedback::query()->with(['user'])->paginate(10)->get();
        return view('Admin/feedback/list',[
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
