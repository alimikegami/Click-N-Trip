<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';

    protected $fillable = [
        'reservation_date',
    ];

    protected $guarded = [
        'day_trip_plan_id',
        'user_id'
    ];

    public function dayTripPlan(){
        return $this->belongsTo(DayTripPlan::class, 'day_trip_plan_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
