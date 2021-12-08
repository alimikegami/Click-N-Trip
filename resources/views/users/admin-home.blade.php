@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
@endsection
@section('body')
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <ul class="list-unstyled components">
            <p><i class="bi bi-speedometer" style="font-size: 24px; color:white;"></i> <span class='py-4 fw-bold side-title'>Dashboard</span></p>
            <hr>
            <li>
                <a href="#"><i class="bi bi-briefcase-fill" style="font-size: 14px; color:white; padding-right: 0.5rem; margin-left:1.5rem;"></i><span class="fw-bold side-navlinks">Tour Guide Apllicant List</span></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-people-fill" style="font-size: 14px; color:white;padding-right: 0.5rem; margin-left:1.5rem;"></i><span class="fw-bold side-navlinks">User List</span></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-credit-card" style="font-size: 14px; color:white;padding-right: 0.5rem; margin-left:1.5rem;"></i><span class="fw-bold side-navlinks">Pending User Payment</span></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-credit-card-fill" style="font-size: 14px; color:white;padding-right: 0.5rem; margin-left:1.5rem;"></i><span class="fw-bold side-navlinks">Approved User Payment</span></a>
            </li>
        </ul>
    </nav>
    <div class="container parent container d-flex justify-content-center align-items-center h-100">
        <div class="container mt-5" id="img-wrapper">
            <img id="image" class="img-fluid" src="Gallery/icon1.png" alt="">
            <h1 class="text-center mt-3">Welcome, Admin</h1>
        </div>
    </div>
 
</div>

@endsection