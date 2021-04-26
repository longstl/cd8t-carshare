<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    public function list()
    {
        $list_feedback = Feedback::query()->with(['user'])->paginate(10)->get();
        return view('admin/feedback/list', [
            'list_feedback' => $list_feedback,
            'title' => 'List Feedback'
        ]);
    }

    public function read($id)
    {
        $feedback = Feedback::find($id);
        return view('admin/feedback/read', [
            'feedback' => $feedback,
        ]);
    }

    public function delete($id)
    {
        $feedback = Feedback::find($id)->with(['user'])->get();
        $feedback->delete();
        return redirect()->route('listFeedback')->with(['status' => 'Feedback deleted successfully', 'feedback' => $feedback->user->name]);
    }

}
