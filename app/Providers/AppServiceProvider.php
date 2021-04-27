<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $notifications = [];
            $count = 0;
            if (Auth::check()) {
                $notifications = Notification::query()->where('user_id', Auth::id())->get();
                foreach ($notifications as $notification) {
                    if (!$notification->is_read) {
                        $count++;
                    }
                }
            }
            $view->with(['notifications' => $notifications, 'unread_count' => $count]);
        });
    }
}
