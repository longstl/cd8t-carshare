<?php
//
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
    public function sendCustomNotification($content, $target)
    {
        $notification = new Notification();
        $notification->fill([
            'content' => $content,
            'target' => $target,
        ]);
        $notification->save();
    }

    public function markRead()
    {
        $notifications = Notification::query()->where('user_id', Auth::id());
        foreach ($notifications as $notification) {
            $notification->is_read = true;
            $notification->save();
        }
        return true;
    }
}
