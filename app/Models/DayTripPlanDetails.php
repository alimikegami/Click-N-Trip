<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTripPlanDetails extends Model
{
    use HasFactory;

    protected $table = 'day_trip_plan_details';

    protected $fillable = [
        'start_time',
        'end_time',
        'destination',
    ];

    protected $guarded = [
        'day_trip_plan_id'
    ];

    public function dayTripPlan(){
        return $this->belongsTo(DayTripPlan::class, 'day_trip_plan_id');
    }
}
