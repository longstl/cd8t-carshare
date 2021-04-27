<?php

namespace App\Providers;

use App\Enums\RideStatus;
use App\Models\Notification;
use App\Models\Ride;
use Illuminate\Database\Eloquent\Builder;
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
        view()->composer('*', function ($view) {
            $notifications = [];
            $ride_count = 0;
            $count = 0;
            if (Auth::check()) {
                $notifications = Notification::query()->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
                foreach ($notifications as $notification) {
                    if (!$notification->is_read) {
                        $count++;
                    }
                }
                $ride_count = Ride::query()->whereIn('status', [RideStatus::PENDING, RideStatus::CONFIRMED, RideStatus::MATCHED])->whereHas('car', function (Builder $q) {
                    $q->where('user_id', Auth::id());
                })->count();
            }
            $view->with(['notifications' => $notifications, 'unread_count' => $count, 'ride_count' => $ride_count]);
        });
    }
}
