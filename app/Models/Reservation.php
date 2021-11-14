<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'day_trip_images';

    protected $fillable = [
        'reservation_date',
    ];

    protected $guarded = [
        'day_trip_plan_id',
        'tour_guide_id',
        'user_id'
    ];
}
