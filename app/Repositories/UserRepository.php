<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

    public function store($userData)
    {
        $userData['password'] = Hash::make($userData['password']);
        $user = new User($userData);
        $user->role = "user";
        $user->save();
        return $user->fresh();
    }

    public function storeTourGuide($userData, $imgPath)
    {
        $user = User::find(Auth::id());
        // dd($userData);
        $user->nik = $userData["nik"];
        $user->address = $userData["address"];
        $user->province = $userData["province"];
        $user->selfie_with_ktp = $imgPath[2];
        $user->save();

        return $user;
    }

    public function getReservationHistoryByUserId($id)
    {
        $history = DB::select('SELECT r.*, dtp.title, dtp.destination, dtp.price_per_day FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = dtp.id WHERE r.user_id = ?', [$id]);
        return $history;
    }
}
