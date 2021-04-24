<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ride extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_car_id',
        'travel_start_time',
        'origin_address',
        'origin_coordinate',
        'destination_address',
        'destination_coordinate',
        'distance',
        'seats_offered',
        'seats_available',
        'contribution_per_head',
    ];
    public function userCar(){
        return $this->belongsTo(UserCar::class);
    }
}
