<?php 

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function getAllUserDataById($id){
        return $this->userRepository->getAllUserDataById($id);
    }

    public function store($userData){
        return $this->userRepository->store($userData);
    }

    public function storeTourGuide($userData, $img){
        $path = $img->store('public/selfie-ktp');
        $temp = explode('/', $path);    // Getting the attachment name
        $user = $this->userRepository->storeTourGuide($userData, $temp);
        return $user;
    }

    public function authenticate($credentials){
        if (Auth::attempt($credentials)) {
            return true;
        }
        
        return false;
    }

    public function getReservationHistoryByUserId($id){
        return $this->userRepository->getReservationHistoryByUserId($id);
    }

    public function getListings($id){
        return $this->userRepository->getListings($id);
    }
}

?>