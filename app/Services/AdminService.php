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
}

?>