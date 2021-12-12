<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReviewService;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function store(Request $request, $id){
        $bodyContent = $request->json()->all();
        $res = $this->reviewService->store($bodyContent, $id, Auth::id());
        if ($res){
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => 'invalid'], 500);
    }
}
