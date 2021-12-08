<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayTripStoreRequest;
use App\Models\DayTripPlan;
use App\Models\DayTripPlanDetails;
use App\Models\DayTripPlanImages;
use App\Services\DayTripPlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DayTripPlanController extends Controller
{
    protected $dayTripPlanService;

    public function __construct(DayTripPlanService $dayTripPlanService)
    {
        $this->dayTripPlanService = $dayTripPlanService;
    }

    public function search(){
        $result = $this->dayTripPlanService->searchByKeyword(request('search'));
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
        $queryState = $this->dayTripPlanService->book($bodyContent);
        if ($queryState){
            return response()->json(['status' => 'reservation has been made'], 200);
        }
        return response()->json(['status' => 'invalid'], 500);
    }

    public function store(DayTripStoreRequest $request) {
        $validated = $request->validated();
        $queryState = $this->dayTripPlanService->store($validated);
        if ($queryState) {
            return back()->with('success', 'Day Trip Listing Successfully Created!');
        }
        return back()->with('error', 'Day Trip Listing Could Not Be Created!');
    }

    public function delete(Request $request, $id){
        $querystate = $this->dayTripPlanService->delete($id);
        if ($querystate) {
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => 'invalid'], 500);
    }

    public function showReservation(Request $request, $id){
        $dayTripPlan = $this->dayTripPlanService->getDayTripPlanById($id);
        $reservation = $this->dayTripPlanService->getReservationById($id);
        return view('users.my-day-trip-listing-reservation', [
            "dayTripPlan" => $dayTripPlan,
            "reservation" => $reservation
        ]);

    }

    public function updateStatus(Request $request, $resId){
        $bodyContent = $request->json()->all();
        $res = $this->dayTripPlanService->updateStatus($bodyContent["status"], $resId);
        if ($res){
            return response()->json(['status' => "success"], 200);
        }
        
        return response()->json(['status' => $resId], 200);
    }
}
