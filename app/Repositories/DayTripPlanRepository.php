<?php

namespace App\Repositories;

use App\Models\DayTripPlan;
use App\Models\DayTripPlanImages;
use App\Models\DayTripPlanDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DayTripPlanRepository
{
    protected $dayTripPlan;

    public function __construct(DayTripPlan $dayTripPlan)
    {
        $this->dayTripPlan = $dayTripPlan;
    }

    public function searchByKeyword($keyword)
    {
        return DayTripPlan::filter($keyword);
    }

    public function store($daytripPlanData)
    {
        $fillableData = [
            'title' => $daytripPlanData["title"],
            'destination' => $daytripPlanData["destination"],
            'description' => $daytripPlanData["description"],
            'price_per_day' => $daytripPlanData["price_per_day"],
            'max_capacity_per_day' => $daytripPlanData["max_capacity_per_day"],
        ];
        $dayTripPlan = new DayTripPlan($fillableData);
        $dayTripPlan->user_id = Auth::id();
        $dayTripPlan->save();

        for ($x = 0; $x < count($daytripPlanData["time_start"]); $x++) {
            $dayTripPlanDetails = new DayTripPlanDetails();
            $time = strtotime($daytripPlanData["time_start"][$x]);
            $startTime = date("H:i:s", $time);
            $dayTripPlanDetails->start_time = $startTime;
            $time = strtotime($daytripPlanData["time_end"][$x]);
            $endTime = date("H:i:s", $time);
            $dayTripPlanDetails->end_time = $endTime;
            $dayTripPlanDetails->agenda = $daytripPlanData["agenda"][$x];
            $dayTripPlanDetails->day_trip_plan_id = $dayTripPlan->id;
            $dayTripPlanDetails->save();
        }

        // Saving attachment file path and creating the record for each attachment
        if ($daytripPlanData["images"]) {
            $files = $daytripPlanData['images'];
            foreach ($files as $file) {
                $path = $file->store('public/day-trip');
                $temp = explode('/', $path);    // Getting the attachment name
                $dayTripPlanImages = new DayTripPlanImages();
                $dayTripPlanImages->image_path = $temp[2];
                $dayTripPlanImages->day_trip_plan_id = $dayTripPlan->id;
                $dayTripPlanImages->save();
            }
        }

        return $dayTripPlan;
    }

    public function book($bodyContent)
    {
        // check the number of reservation for that particular date
        $numberOfReservation = DB::select('SELECT COUNT(*) AS amount FROM reservation WHERE day_trip_plan_id = ? AND reservation_date = ?', [$bodyContent["day_trip_plan_id"], $bodyContent["date"]]);
        // return response()->json(['success' => $numberOfReservation[0]->amount], 200);
        // check the maximum capacity of the day trip plan
        $maximumCapacity = DB::select('SELECT max_capacity_per_day FROM day_trip_plan WHERE id = ?', [$bodyContent["day_trip_plan_id"]]);
        // if it exceeds the capacity, reservation can't be made
        if ($numberOfReservation[0]->amount >= $maximumCapacity[0]->max_capacity_per_day) {
            return false;
        }
        // create reservation
        $queryState = DB::insert('INSERT INTO reservation (day_trip_plan_id, user_id, person, reservation_date) VALUES (?, ?, ?, ?)', [$bodyContent["day_trip_plan_id"], Auth::id(), $bodyContent["person"], $bodyContent["date"]]);
        if ($queryState) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $queryState = DB::delete('DELETE FROM day_trip_plan WHERE id = ?', [$id]);
        return $queryState;
    }

    public function getReservationById($userId, $dtpId)
    {
        $res = DB::select('SELECT r.* FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = r.day_trip_plan_id WHERE dtp.user_id = ? AND r.day_trip_plan_id = ?', [$userId, $dtpId]);

        return $res;
    }

    public function getDayTripPlanById($id)
    {
        $res = DB::select('SELECT * FROM day_trip_plan dtp WHERE id = ?', [$id]);
        return $res;
    }

    public function updateStatus($status, $resId)
    {
        $affected = DB::update('UPDATE reservation SET status = ? WHERE id = ?', [$status, $resId]);

        return $affected;
    }

    public function updatePaymentProof($imgPath, $id)
    {
        $res = DB::update('UPDATE reservation SET payment_image_path = ? WHERE id = ?', [$imgPath, $id]);

        return $res;
    }
}
