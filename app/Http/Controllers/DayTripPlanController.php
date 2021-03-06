<?php

namespace App\Http\Controllers;

use App\Models\DayTripPlan;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ReviewService;
use App\Models\DayTripPlanImages;
use App\Models\DayTripPlanDetails;
use Illuminate\Support\Facades\DB;
use App\Services\DayTripPlanService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DayTripEditRequest;
use App\Http\Requests\DayTripStoreRequest;

class DayTripPlanController extends Controller
{
    protected $dayTripPlanService;
    protected $reviewService;
    protected $userService;

    public function __construct(DayTripPlanService $dayTripPlanService, ReviewService $reviewService, UserService $userService)
    {
        $this->dayTripPlanService = $dayTripPlanService;
        $this->reviewService = $reviewService;
        $this->userService = $userService;
    }

    public function search()
    {
        $result = $this->dayTripPlanService->searchByKeyword(request('search'));
        return view("day-trips.search-result", [
            "search_result" => $result,
            "keyword" => request('search')
        ]);
    }

    public function show(DayTripPlan $day_trip_plan)
    {
        $reviews = $this->reviewService->getReviewsByDayTripId($day_trip_plan->id);
        $dayTripPlanImages = $this->dayTripPlanService->getImages($day_trip_plan->id);
        return view('day-trips.day-trip-pages', [
            "dayTripPlan" => $day_trip_plan,
            "reviews" => $reviews,
            "images" => $dayTripPlanImages
        ]);
    }

    public function book(Request $request)
    {
        $bodyContent = $request->json()->all();
        $queryState = $this->dayTripPlanService->book($bodyContent);
        if ($queryState) {
            return response()->json(['status' => 'reservation has been made'], 200);
        }
        return response()->json(['status' => 'invalid'], 500);
    }

    public function store(DayTripStoreRequest $request)
    {
        $validated = $request->validated();
        $queryState = $this->dayTripPlanService->store($validated);
        if ($queryState) {
            return back()->with('success', 'Day Trip Listing Successfully Created!');
        }
        return back()->with('error', 'Day Trip Listing Could Not Be Created!');
    }

    public function delete(Request $request, $id)
    {
        $querystate = $this->dayTripPlanService->delete($id);
        if ($querystate) {
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => 'invalid'], 500);
    }

    public function showReservation(Request $request, $id)
    {
        $dayTripPlan = $this->dayTripPlanService->getDayTripPlanById($id);
        $reservation = $this->dayTripPlanService->getReservationById($id);
        $listingCount = $this->userService->getListingCount($id);
        return view('users.my-day-trip-listing-reservation', [
            "dayTripPlan" => $dayTripPlan,
            "reservation" => $reservation,
            'listingCount' => $listingCount
        ]);
    }

    public function updateStatus(Request $request, $resId)
    {
        $bodyContent = $request->json()->all();
        $res = $this->dayTripPlanService->updateStatus($bodyContent["status"], $resId);
        if ($res) {
            return response()->json(['status' => "success"], 200);
        }

        return response()->json(['status' => "invalid"], 500);
    }

    public function updatePaymentProof(Request $request, $id)
    {
        $res = $this->dayTripPlanService->updatePaymentProof($request->file('proofImg'), $id);
        if ($res) {
            return response()->json(['status' => "success"], 200);
        }

        return response()->json(['status' => "invalid"], 500);
    }

    public function showEditForm($id)
    {
        $dayTripPlan = $this->dayTripPlanService->getDayTripPlanById($id);
        $dayTripPlanDetails = $this->dayTripPlanService->getDayTripPlanDetails($id);

        return view('users.edit-day-trip-plan', [
            "dayTripPlan" => $dayTripPlan,
            "dayTripPlanDetails" => $dayTripPlanDetails
        ]);
    }

    public function edit(DayTripEditRequest $request, $id)
    {
        $validated = $request->validated();
        $status = $this->dayTripPlanService->editDayTripPlan($validated, $id);
        if ($status)
        {
            return back()->with('success', 'Day Trip Listing Successfully Changed!');

        }
        return back()->with('error', 'Day Trip Listing Could Not Be Changed!');
    }
}
