<?php

namespace App\Http\Controllers;

use App\Models\DayTripPlan;
use App\Models\DayTripPlanDetails;
use App\Models\DayTripPlanImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DayTripPlanController extends Controller
{
    public function search(){
        $searchResult = DayTripPlan::filter(request('search'));
        return view("day-trips.search-result", [
            "search_result"=>$searchResult,
            "keyword"=>request('search')
    ]);

    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price_per_day' => 'required',
            'max_capacity_per_day' => 'required',
            'time_start' => 'required|array|min:1',
            'time_end' => 'required|array|min:1',
            'agenda' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:png,jpeg|max:5120',
        ]);

        $fillable_data = [
            'title' => $request->title,
            'description' => $request->description,
            'price_per_day' => $request->price_per_day,
            'max_capacity_per_day' => $request->max_capacity_per_day,
        ];
        $day_trip_plan = new DayTripPlan($fillable_data);
        $day_trip_plan->user_id = Auth::id();
        $day_trip_plan->save();
        
        for ($x = 0; $x < count($request->time_start); $x++) {
            $day_trip_plan_details = new DayTripPlanDetails();
            $time=strtotime($request->time_start[$x]);
            $start_time = date("H:i:s",$time);
            $day_trip_plan_details->start_time = $start_time;
            $time=strtotime($request->time_end[$x]);
            $end_time = date("H:i:s",$time);
            $day_trip_plan_details->end_time = $end_time;
            $day_trip_plan_details->destination = $request->agenda[$x];
            $day_trip_plan_details->day_trip_plan_id = $day_trip_plan->id;
            $day_trip_plan_details->save();
        }

        // Saving attachment file path and creating the record for each attachment
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $path = $file->store('day-trip');
                $temp = explode('/', $path);    // Getting the attachment name
                $day_trip_plan_images = new DayTripPlanImages();
                $day_trip_plan_images->image_path = $temp[1];
                $day_trip_plan_images->day_trip_plan_id = $day_trip_plan->id;
                $day_trip_plan_images->save();
            }
        }

        return back()->with('success', 'Day Trip Listing Successfully Created!');
    }
}
