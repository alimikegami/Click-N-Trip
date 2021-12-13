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
        return DB::select('SELECT dtp.title, dtp.id, dtp.destination, dtp.price_per_day, ROUND(AVG(r2.star_count)) AS star_count, dti.image_path FROM day_trip_plan dtp LEFT JOIN reservation r ON r.day_trip_plan_id = dtp.id LEFT JOIN review r2 ON r2.reservation_id = r.id LEFT JOIN day_trip_image dti ON dti.day_trip_plan_id = dtp.id WHERE dtp.user_id = ? GROUP BY dtp.id', [$id]);
    
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
        $history = DB::select('SELECT r.*, dtp.title, dtp.destination, dtp.price_per_day, dtpi.image_path FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = dtp.id LEFT JOIN day_trip_image dtpi ON dtp.id = dtpi.day_trip_plan_id WHERE r.user_id = ? GROUP BY dtp.id', [$id]);
        return $history;
    }

    public function getListings($id)
    {
        $myListing = DB::select('SELECT dtp.title, dtp.id, dtp.destination, dtp.price_per_day, ROUND(AVG(r2.star_count)) AS star_count, dti.image_path FROM day_trip_plan dtp LEFT JOIN reservation r ON r.day_trip_plan_id = dtp.id LEFT JOIN review r2 ON r2.reservation_id = r.id LEFT JOIN day_trip_image dti ON dti.day_trip_plan_id = dtp.id WHERE dtp.user_id = ? GROUP BY dtp.id', [$id]);
        return $myListing;
    }

    public function getListingCount($id)
    {  
        $listingCount = DB::select('SELECT COUNT(*) AS count FROM day_trip_plan WHERE user_id = ?', [$id]);
        return $listingCount;
    }
}
