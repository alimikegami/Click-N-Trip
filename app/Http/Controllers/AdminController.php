<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function showDashboard(){
        return view('admin.admin-home');
    }

    public function showUsers(){
        $users = $this->adminService->getUsers();
        return view('admin.admin-user-list',[
            'users'=>$users
        ]);
    }

    public function showPaymentDetails(){
        $payment = $this->adminService->getPendingPayments();
        return view('admin.admin-pending-payment', [
            'payments' => $payment
        ]);
    }

    public function showTransactionHistory(){
        $history = $this->adminService->getTransactionHistory();
        return view('admin.admin-approved-payment', [
            "history" => $history
        ]);
    }

    public function showTourGuideApplications(){
        $users = $this->adminService->getTourGuideApplications();
        return view('admin.admin-tour-apply', [
            'applications'=>$users
        ]);
    }

    public function setApplicationResults(Request $request, $id){
        $bodyContent = $request->json()->all();
        $res = $this->adminService->setApplicationResults($id, $bodyContent["status"]);
        if ($res) {
            return response()->json(['status' => "success"], 200);
        }
        return response()->json(['status' => "invalid"], 500);
    }

    public function setUserAccess(Request $request, $id){
        $bodyContent = $request->json()->all();
        $res = $this->adminService->setUserAccess($id, $bodyContent["status"]);
        if ($res) {
            return response()->json(['status' => "success"], 200);
        }
        return response()->json(['status' => "invalid"], 500);
    }
}
