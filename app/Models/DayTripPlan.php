<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTripPlan extends Model
{
    use HasFactory;

    protected $table = 'day_trip_plan';

    protected $fillable = [
        'title',
        'description',
        'price_per_day',
        'max_capacity_per_day',
    ];

    protected $guarded = [
        'user_id',
    ];
}