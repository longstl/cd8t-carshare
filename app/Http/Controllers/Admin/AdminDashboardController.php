<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RideStatus;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function list()
    {
        $ride_stats = DB::table('rides')
            ->select(DB::raw('DATE(travel_start_time) as date'), DB::raw('count(*) as count'))
            ->where('status', '<>', RideStatus::CANCELED)
            ->groupBy('date')
            ->get();
        return view('admin/dashboard/list', [
            'ride_stats' => $ride_stats,
        ]);
    }

    public function getRideStats(Request $request)
    {
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');
        $ride_stats = DB::table('rides')
            ->select(DB::raw('DATE(travel_start_time) as date'), DB::raw('count(*) as count'))
            ->where('status', '<>', RideStatus::CANCELED)
            ->groupBy('date');
        if ($start_date) {
            $ride_stats = $ride_stats->having('date', '>=', $start_date);
        }
        if ($end_date) {
            $ride_stats = $ride_stats->having('date', '<=', $end_date);
        }
        return $ride_stats->get();
    }

    public function getBillStats(Request $request)
    {
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');
        $ride_stats = DB::table('rides')
            ->select(DB::raw('DATE(travel_start_time) as date'), DB::raw('sum(price_total) as sum'))
            ->where('status', '=', RideStatus::COMPLETED)
            ->groupBy('date');
        if ($start_date) {
            $ride_stats = $ride_stats->having('date', '>=', $start_date);
        }
        if ($end_date) {
            $ride_stats = $ride_stats->having('date', '<=', $end_date);
        }
        return $ride_stats->get();
    }
}
