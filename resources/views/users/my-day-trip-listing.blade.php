@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
@endsection
@section('body')
@include('components.navbar')
    <div id="outer-container" class="container">
        <div class="row">
            <div class="col-lg-4 d-flex justify-content-center">
                <div id="profile-info-holder" class="container border">
                    <div id="icon-holder" class="container d-flex align-items-center justify-content-center mt-4">
                        <i class="bi bi-person-circle" style="font-size: 5rem; color:#14279B;"></i>
                    </div>
                    <div id="text-holder" class="container mt-4 mb-5">
                        <p class="fw-bold text-center">User Profile</p>
                        <p>Name: {{ $user->name }}</p>
                        <p>Total Listing:</p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container-fluid" id="trip-container">
                    <h3 class="mb-3 mt-sm-4 mt-md-4">My Day Trip Listing</h3>
                    @foreach ($listings as $listing)
                    <div id="trip-outside-container" class="container border rounded">
                        <div id="trip-inside-container" class="container">
                            <div class="row mt-3 mb-3">
                                <div id="image-holder" class="col-lg-4 col-md-4">
                                    <img id="image" class="img-fluid rounded" src="Gallery/Uluwatu.jpg" alt="">
                                </div>
                                <div id="plan-desc" class="col">
                                    <p>
                                        {{ $listing->title }}
                                        <br> <span style='font-size: 14px;'>{{ $listing->destination }}</span>
                                    </p> 
                                    <div id='stars'>
                                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                                        <span id='star-text'>5 out of 5</span>
                                    </div>
                                    <div id="list-buttons" class="pt-3">
                                        <a href=""><i class="bi bi-pencil-square border me-2 px-2" style="font-size: 1.7rem; color:black;"></i></a>
                                        <a href=""><i class="bi bi-trash border me-2 px-2" style="font-size: 1.7rem; color:black;"></i></a>
                                        <button class="btn btn-secondary ">See Reservation</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="container d-flex justify-content-center mt-4 mb-4">
                    <div class="container d-flex justify-content-center mt-4 mb-4">
                        {{ $listings->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection