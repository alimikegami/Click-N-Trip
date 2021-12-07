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
        'destination',
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

    public function dayTripPlan(){
        return $this->hasMany(Reservation::class, 'user_id');
    }

    public function scopeFilter($query, $search) {
        return $query->where('title', 'like', '%'.$search.'%')->with('user')->paginate(5);
    }

    public function scopeListings($query, $id) {
        return $query->where('user_id', $id)->paginate(5);
    }

    public static function getDayTripPlanWithImages(){
        return DayTripPlan::with('dayTripImages')->get();
    }
}
