<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'make',
        'model',
        'make_year',
        'comfort_level',
        'seats_total'
    ];
    public function userCars(){
        return $this->hasMany(UserCar::class);
    }
}
