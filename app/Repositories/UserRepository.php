<?php 

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUserDataById($id)
    {
        return $this->user::getAllUserDataById($id);
    }

    public function store($userData) {
        $userData['password'] = Hash::make($userData['password']);
        $user = new User($userData);
        $user->role = "user";
        $user->save();
        return $user->fresh();
    }

    public function storeTourGuide($userData, $imgPath){
        $user = User::find(Auth::id());
        // dd($userData);
        $user->nik = $userData["nik"];
        $user->address = $userData["address"];
        $user->province = $userData["province"];
        $user->selfie_with_ktp = $imgPath[1];
        $user->role = "tour guide";
        $user->save();

        return $user;
    }
}


?>