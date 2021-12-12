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
        // return DayTripPlan::filter($keyword);
        return DB::select("SELECT tbl.*, dtpi.image_path FROM (SELECT dtp.id, ROUND(AVG(star_count)) star_count, u.name, dtp.price_per_day, dtp.title, dtp.destination FROM day_trip_plan dtp INNER JOIN users u ON u.id = dtp.user_id LEFT JOIN reservation r ON dtp.id = r.day_trip_plan_id LEFT JOIN review r2 ON r.id = r2.reservation_id GROUP BY dtp.id) tbl LEFT JOIN day_trip_image dtpi ON tbl.id = dtpi.day_trip_plan_id WHERE title LIKE ? OR destination LIKE ? GROUP BY tbl.id;", ["%".$keyword."%", "%".$keyword."%"]);
    }

    public function getImages($id){
        return DB::select('SELECT * FROM day_trip_image WHERE day_trip_plan_id = ?', [$id]);
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
        // return $numberOfReservation[0]->amount;
        // return response()->json(['success' => $numberOfReservation[0]->amount], 200);
        // check the maximum capacity of the day trip plan
        $maximumCapacity = DB::select('SELECT max_capacity_per_day FROM day_trip_plan WHERE id = ?', [$bodyContent["day_trip_plan_id"]]);
        // if it exceeds the capacity, reservation can't be made
        // return $maximumCapacity[0]->max_capacity_per_day;

        if ($numberOfReservation[0]->amount >= $maximumCapacity[0]->max_capacity_per_day) {
            return false;
        }

        if ($bodyContent["person"] > $maximumCapacity[0]->max_capacity_per_day){
            return false;
        }
        // create reservation
        $queryState = DB::insert('INSERT INTO reservation (day_trip_plan_id, user_id, person, reservation_date) VALUES (?, ?, ?, ?)', [(int)$bodyContent["day_trip_plan_id"], Auth::id(), (int)$bodyContent["person"], $bodyContent["date"]]);
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
        $res = DB::select('SELECT r.* FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = dtp.id WHERE dtp.user_id = ? AND r.day_trip_plan_id = ?', [$userId, $dtpId]);

        return $res;
    }

    public function getDayTripPlanById($id)
    {
        $res = DB::select('SELECT dtp.title, dtp.id, dtp.destination, dtp.price_per_day, ROUND(AVG(r2.star_count)) AS star_count, dti.image_path FROM day_trip_plan dtp LEFT JOIN reservation r ON r.day_trip_plan_id = dtp.id LEFT JOIN review r2 ON r2.reservation_id = r.id LEFT JOIN day_trip_image dti ON dti.day_trip_plan_id = dtp.id WHERE dtp.id = ? GROUP BY dtp.id', [$id]);
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
