<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weather extends Model
{
    use HasFactory;
    protected $table = 'weather-report';

     protected $fillable = [
        'City',
        'description',
        'temp',
        'feels_like',
        'temp_min',
        'temp_max',
        'pressure',
        'humidity',
        'visibility',
    ];
}