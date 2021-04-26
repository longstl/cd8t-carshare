<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\RequestRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function list()
    {
        $list_feedback = Feedback::query()->with(['user'])->get();
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

    public function create()
    {
        $user_id = Auth::id();
        $feedback = DB::table('feedbacks')->where('user_id', $user_id)->get();
        return view('web/contact', ['feedback' => $feedback]);
    }

    public function storeFeedback(FeedbackRequest $request)
    {
        $content = 'content';
        $request->validated();
//        $data['user_id'] = Auth::id();
        $feedback = DB::table('feedbacks')->insert([
            'title'=>$request->title,
            'user_id' => Auth::id(),
            'content' => $request->$content,
            'created_at' => Carbon::now(),
        ]);

        return view('web/thank-you');
    }

    public function update()
    {
    }

    public function save()
    {
    }

    public function delete($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect()->route('listFeedback')->with(['status' => 'delete feedback success']);
    }

    public function thankYou()
    {
        return view('web/thank-you');

    }
}
