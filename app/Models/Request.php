<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'pickup_address',
        'pickup_coordinate',
        'pickup_time',
        'ride_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ride(){
        return $this->belongsTo(Ride::class);
    }
}
