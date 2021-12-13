<?php 

namespace App\Repositories;

use App\Models\Review;
use Illuminate\Support\Facades\DB;

class ReviewRepository{

    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function store($bodyContent, $id, $userId){
        $res = DB::insert('INSERT INTO review (star_count, description, reservation_id, user_id) VALUES (?, ?, ?, ?)', [(int)$bodyContent["review_count"], $bodyContent["review_content"], (int)$id, (int)$userId]);
        if ($res) {
            return true;
        }
        return false;
    }

    public function getReviewsByDayTripId($id){
        $res = DB::select('SELECT r.*, u.* FROM review r INNER JOIN users u ON r.user_id = u.id INNER JOIN reservation res ON r.reservation_id = res.id INNER JOIN day_trip_plan dtp ON dtp.id = res.day_trip_plan_id WHERE res.day_trip_plan_id = ?', [$id]);
        return $res;
    }
}

?>