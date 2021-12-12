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
        $res = DB::insert('INSERT INTO review (star_count, description, day_trip_plan_id, user_id) VALUES (?, ?, ?, ?)', [(int)$bodyContent["review_count"], $bodyContent["review_content"], (int)$id, (int)$userId]);
        if ($res) {
            return true;
        }
        return false;
    }

    public function getReviewsByDayTripId($id){
        $res = DB::select('SELECT * FROM review r INNER JOIN users u ON r.user_id = u.id  WHERE day_trip_plan_id = ?', [$id]);
        return $res;
    }
}

?>