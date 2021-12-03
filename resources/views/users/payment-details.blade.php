@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
@endsection
@section('body')
@include('components.navbar-logged-in')
    <div id="outer-container" class="container">
        <div class="row">
            <div class="col-lg-4 d-flex justify-content-center">
                <div id="profile-info-holder" class="container border">
                    <div id="icon-holder" class="container d-flex align-items-center justify-content-center mt-4">
                        <i class="bi bi-person-circle" style="font-size: 5rem; color:#14279B;"></i>
                    </div>
                    <div id="text-holder" class="container mt-4 mb-5">
                        <p class="fw-bold text-center">My Account</p>
                        <p>Name: Alim Ikegami</p>
                        <p>Email: alimikegami1@gmail.com</p>
                        <p>Total Listing: 5</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container-fluid" id="trip-container">
                    <h3 class="mb-3 mt-sm-4 mt-md-4">Payment Details</h3>
                        <div id="trip-inside-container" class="container">
                            <div id="methods" class="pt-4 d-flex justify-content-center">
                                    <a href=""><img src="../Gallery/bca 2.png"  alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-center pt-4">
                                <p class="fw-bold">Account Number</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p>123123123</p>
                            </div>
                            <div class="d-flex justify-content-center pt-3">
                                <p class="fw-bold">Account Name</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p>PT. Click n Trip</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection