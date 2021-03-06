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
        $payments = DB::select("SELECT * FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = dtp.id WHERE status = 1 AND payment_image_path != ''");
        return $payments;
    }

    public function getUsers(){
        $users = DB::select("SELECT * FROM users WHERE role != 'admin'");
        return $users;
    }

    public function getTransactionHistory(){
        $history = DB::select("CALL GetAllTransactionHistory()");
        return $history;
    }

    public function setApplicationResults($id, $status){
        $affected = DB::update("UPDATE users SET is_approved_as_tour_guide = ?, role = 'tour_guide' WHERE id = ?", [$status, $id]);
        return $affected;
    }

    public function setPaymentApproval($id, $status){
        $affected = DB::update('UPDATE reservation SET status = ? WHERE id = ?', [$status, $id]);
        return $affected;
    }

    public function setUserAccess($id, $status){
        $affected = DB::update('UPDATE users SET is_blocked = ? WHERE id = ?', [$status, $id]);
        return $affected;
    }

    public function getUsersByKeyword($keyword){
        $users = DB::select("SELECT * FROM users WHERE name LIKE ? OR nik LIKE ? OR email LIKE ?", ["%" . $keyword . "%", "%" . $keyword . "%", "%" . $keyword . "%"]);
        return $users;
    }

    public function getTransactionHistoryByKeyword($keyword)
    {
        $transaction = DB::select("SELECT * FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = dtp.id INNER JOIN users u ON u.id = r.user_id WHERE status = 3 AND u.email LIKE ? OR dtp.title LIKE ?", ["%" . $keyword . "%", "%" . $keyword . "%"]);
        return $transaction;
    }
}


?>