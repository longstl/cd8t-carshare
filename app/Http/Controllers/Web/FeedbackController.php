<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function list(){
        $list_feedback = Feedback::query()->with(['user'])->get();
        return view('Admin/feedback/list',[
            'list_feedback'=>$list_feedback,
            'title'=>'List Feedback'
        ]);
    }
    public function read($id){
        $feedback = Feedback::find($id);
        return view('Admin/feedback/read',[
            'feedback'=>$feedback,

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
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect()->route('listFeedback')->with(['status' => 'delete feedback success']);
    }
    //
}
