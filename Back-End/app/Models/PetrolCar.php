<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetrolCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'fuel',
        'fuel_capacity',
        'price',
    ];
}
