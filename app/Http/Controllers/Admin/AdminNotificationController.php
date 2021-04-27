<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Notification;
use Illuminate\Http\Request;

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
}
