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

    public function dayTripDetails(){
        return $this->hasMany(DayTripPlanDetails::class, 'day_trip_plan_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dayTripImages(){
        return $this->hasMany(DayTripPlanImages::class, 'day_trip_plan_id');
    }

    public function scopeFilter($query, $search) {
        return $query->where('title', 'like', '%'.$search.'%');
    }
}
