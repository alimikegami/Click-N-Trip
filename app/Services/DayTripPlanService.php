<?php 

namespace App\Services;

use App\Repositories\DayTripPlanRepository;

class DayTripPlanService 
{
    protected $dayTripPlanRepository;

    public function  __construct(DayTripPlanRepository $dayTripPlanRepository)
    {
        $this->dayTripPlanRepository = $dayTripPlanRepository;
    }

    public function searchByKeyword($keyword){
        return $this->dayTripPlanRepository->searchByKeyword($keyword);
    }

    public function store($daytripPlanData){
        $queryState = $this->dayTripPlanRepository->store($daytripPlanData);
        if ($queryState) {
            return true;
        }

        return false;
    }

    public function book($bodyContent){
        $queryRes = $this->dayTripPlanRepository->book($bodyContent);
        return $queryRes;
    }
}

?>