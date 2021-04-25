<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends EloquentModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'make',
        'model',
        'make_year',
    ];
    public function userCars(){
        return $this->hasMany(Car::class);
    }
}
