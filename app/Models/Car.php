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
        'user_id',
        'model_id',
        'car_registration_number',
        'color'
    ];
    public function car(){
        return $this->belongsTo(Model::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function rides(){
        return $this->hasMany(Ride::class);
    }
}
