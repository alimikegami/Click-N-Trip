<?php 

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;


class AdminRepository {
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getTourGuideApplications(){
        $user = DB::select("SELECT * FROM users WHERE role = 'user' AND selfie_with_ktp != ''");
        return $user;
    }

    public function getPendingPayments(){
        $payments = DB::select("SELECT * FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = dtp.id WHERE status = 1");
        return $payments;
    }

    public function getUsers(){
        $users = DB::select("SELECT * FROM users");
        return $users;
    }

    public function getTransactionHistory(){
        $history = DB::select("SELECT * FROM reservation WHERE status = 3");
        return $history;
    }
}


?>