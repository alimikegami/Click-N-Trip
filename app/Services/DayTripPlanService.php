<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repositories\DayTripPlanRepository;

class DayTripPlanService
{
    protected $dayTripPlanRepository;

    public function  __construct(DayTripPlanRepository $dayTripPlanRepository)
    {
        $this->dayTripPlanRepository = $dayTripPlanRepository;
    }

    public function searchByKeyword($keyword)
    {
        return $this->dayTripPlanRepository->searchByKeyword($keyword);
    }

    public function store($daytripPlanData)
    {
        $queryState = $this->dayTripPlanRepository->store($daytripPlanData);
        if ($queryState) {
            return true;
        }

        return false;
    }

    public function getImages($id){
        return $this->dayTripPlanRepository->getImages($id);
    }

    public function book($bodyContent)
    {
        $queryRes = $this->dayTripPlanRepository->book($bodyContent);
        return $queryRes;
    }

    public function delete($id)
    {
        $queryRes = $this->dayTripPlanRepository->delete($id);
        return $queryRes;
    }

    public function getReservationById($id)
    {
        $res = $this->dayTripPlanRepository->getReservationById(Auth::id(), $id);
        return $res;
    }

    public function getDayTripPlanById($id)
    {
        $res = $this->dayTripPlanRepository->getDayTripPlanById($id);
        return $res;
    }

    public function updateStatus($status, $id)
    {
        $res = $this->dayTripPlanRepository->updateStatus($status, $id);

        return $res;
    }

    public function updatePaymentProof($imgFile, $id)
    {
        $path = $imgFile->store('public/payment-proof');
        $temp = explode('/', $path);    // Getting the attachment name
        $temp = $temp[2];
        $res = $this->dayTripPlanRepository->updatePaymentProof($temp, $id);

        return $res;
    }
}
