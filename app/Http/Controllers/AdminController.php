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
        return view('admin.admin-pending-payment');

    }

    public function showTransactionHistory(){
        return view('admin.admin-approved-payment');

    }

    public function showTourGuideApplications(){
        $users = $this->adminService->getTourGuideApplications();
        return view('admin.admin-tour-apply', [
            'applications'=>$users
        ]);
    }
}
