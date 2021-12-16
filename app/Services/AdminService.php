<?php 

namespace App\Services;

use App\Repositories\AdminRepository;


class AdminService {
    protected $adminRepository;

    public function  __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getTourGuideApplications(){
        $user = $this->adminRepository->getTourGuideApplications();

        return $user;
    }

    public function getUsers(){
        $users = $this->adminRepository->getUsers();
        return $users;
    }

    public function getTransactionHistory(){
        $history = $this->adminRepository->getTransactionHistory();
        return $history;
    }

    public function getPendingPayments(){
        $payments = $this->adminRepository->getPendingPayments();
        return $payments;
    }

    public function setApplicationResults($id, $status){
        $res = $this->adminRepository->setApplicationResults($id, $status);
        return $res;
    }

    public function setUserAccess($id, $status) {
        $res = $this->adminRepository->setUserAccess($id, $status);
        return $res;
    }

    public function setPaymentApproval($id, $status){
        if ($status == 0){
            $status = 4;
        } else {
            $status = 3;
        }
        $res = $this->adminRepository->setPaymentApproval($id, $status);
        return $res;
    }

    public function getUsersByKeyword($keyword){
        return $this->adminRepository->getUsersByKeyword($keyword);
    }

    public function getTransactionHistoryByKeyword($keyword)
    {
        return $this->adminRepository->getTransactionHistoryByKeyword($keyword);
    }
}

?>