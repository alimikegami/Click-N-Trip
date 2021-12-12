<?php 

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService {
    protected $reviewRepository;

    public function  __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function store($bodyContent, $id, $userId){
        $res = $this->reviewRepository->store($bodyContent, $id, $userId);
        return $res;
    }
}


?>