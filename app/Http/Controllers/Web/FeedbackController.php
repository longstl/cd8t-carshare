<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function list(){
        $list_feedback = Feedback::query()->with(['user'])->get();
        return view('admin/feedback/list',[
            'list_feedback'=>$list_feedback,
            'title'=>'List Feedback'
        ]);
    }
    public function read($id){
        $feedback = Feedback::find($id);
        return view('admin/feedback/read',[
            'feedback'=>$feedback,

        ]);
    }
    public function create(){
        $user_id = Auth::id();
        $feedback = Feedback::query()->where('user_id',$user_id)->with('user')->get();
        return view('web/contact',['feedback' => $feedback]);
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
