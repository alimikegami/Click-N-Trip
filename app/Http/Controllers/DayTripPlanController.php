<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayTripStoreRequest;
use App\Models\DayTripPlan;
use App\Models\DayTripPlanDetails;
use App\Models\DayTripPlanImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DayTripPlanController extends Controller
{
    public function search(){
        $result = DayTripPlan::filter(request('search'));
        return view("day-trips.search-result", [
            "search_result"=>$result,
            "keyword"=>request('search')
        ]);
    }

    public function show(DayTripPlan $day_trip_plan){
        return view('day-trips.day-trip-pages',[
            "dayTripPlan"=>$day_trip_plan
        ]);
    }

    public function book(Request $request){
        $bodyContent = $request->json()->all();
        // check the number of reservation for that particular date
        $numberOfReservation = DB::select('SELECT COUNT(*) AS amount FROM reservation WHERE day_trip_plan_id = ? AND reservation_date = ?', [$bodyContent["day_trip_plan_id"], $bodyContent["date"]]);
        // return response()->json(['success' => $numberOfReservation[0]->amount], 200);
        // check the maximum capacity of the day trip plan
        $maximumCapacity = DB::select('SELECT max_capacity_per_day FROM day_trip_plan WHERE id = ?', [$bodyContent["day_trip_plan_id"]]);
        // if it exceeds the capacity, reservation can't be made
        if ($numberOfReservation[0]->amount >= $maximumCapacity[0]->max_capacity_per_day) {
            return response()->json(['status' => 'not available'], 200);
        }
        // create reservation
        $queryState = DB::insert('INSERT INTO reservation (day_trip_plan_id, user_id, person, reservation_date) VALUES (?, ?, ?, ?)', [$bodyContent["day_trip_plan_id"], Auth::id(), $bodyContent["person"], $bodyContent["date"]]);
        if ($queryState){
            return response()->json(['status' => 'reservation has been made'], 200);
        }
        return response()->json(['status' => 'invalid'], 500);
    }

    public function store(DayTripStoreRequest $request) {
        $validated = $request->validated();

        $fillableData = [
            'title' => $request->title,
            'destination' => $request->destination,
            'description' => $request->description,
            'price_per_day' => $request->price_per_day,
            'max_capacity_per_day' => $request->max_capacity_per_day,
        ];
        $dayTripPlan = new DayTripPlan($fillableData);
        $dayTripPlan->user_id = Auth::id();
        $dayTripPlan->save();
        
        for ($x = 0; $x < count($request->time_start); $x++) {
            $dayTripPlanDetails = new DayTripPlanDetails();
            $time=strtotime($request->time_start[$x]);
            $start_time = date("H:i:s",$time);
            $dayTripPlanDetails->start_time = $start_time;
            $time=strtotime($request->time_end[$x]);
            $end_time = date("H:i:s",$time);
            $dayTripPlanDetails->end_time = $end_time;
            $dayTripPlanDetails->agenda = $request->agenda[$x];
            $dayTripPlanDetails->day_trip_plan_id = $dayTripPlan->id;
            $dayTripPlanDetails->save();
        }

        // Saving attachment file path and creating the record for each attachment
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $path = $file->store('public/day-trip');
                $temp = explode('/', $path);    // Getting the attachment name
                $dayTripPlanImages = new DayTripPlanImages();
                $dayTripPlanImages->image_path = $temp[2];
                $dayTripPlanImages->day_trip_plan_id = $dayTripPlan->id;
                $dayTripPlanImages->save();
            }
        }

        return back()->with('success', 'Day Trip Listing Successfully Created!');
    }
}
