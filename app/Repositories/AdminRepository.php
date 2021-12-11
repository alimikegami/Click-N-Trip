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
        $user = DB::select("SELECT * FROM users WHERE role = 'user' AND selfie_with_ktp != '' AND is_approved_as_tour_guide = 0");
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
        $history = DB::select("SELECT * FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = dtp.id WHERE status = 3");
        return $history;
    }

    public function setApplicationResults($id, $status){
        $affected = DB::update("UPDATE users SET is_approved_as_tour_guide = ?, role = 'admin' WHERE id = ?", [$status, $id]);
        return $affected;
    }

    public function setPaymentApproval($id, $status){
        $affected = DB::update('UPDATE reservation SET status = ? WHERE id = ?', [$status, $id]);
        return $affected;
    }

    public function blockUser($id){
        $affected = DB::update('UPDATE users SET is_blocked = 1 WHERE id = ?', [$id]);
        return $affected;
    }
}


?>