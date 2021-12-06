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
                        <p class="fw-bold text-center">My Account</p>
                        <p>Name: Alim Ikegami</p>
                        <p>Email: alimikegami1@gmail.com</p>
                        <p>Total Listing: 5</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container-fluid" id="trip-container">
                    <h3 class="mb-3 mt-sm-4 mt-md-4">Transaction History</h3>
                    <div id="trip-outside-container" class="container border rounded">
                        <div id="trip-inside-container" class="container">
                            <div class="row mt-3 mb-3">
                                <div id="image-holder" class="col-lg-5 col-md-5">
                                    <img id="image" class="img-fluid rounded" src="Gallery/Uluwatu.jpg" alt="">
                                </div>
                                <div id="plan-desc" class="col">
                                    <p>
                                        Seminyak Beach Tour
                                        <br> <span style='font-size: 14px;'>Seminyak, Bali</span>
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
                                        <div>
                                            <span class="text-white rounded px-3 py-1 status finished">Finished</span>
                                        </div>
                                        <button id="reviewbutton" class="btn btn-secondary mt-3">Leave a Review</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="trip-outside-container" class="container border rounded mt-3">
                        <div id="trip-inside-container" class="container">
                            <div class="row mt-3 mb-3">
                                <div id="image-holder" class="col-lg-5 col-md-5">
                                    <img id="image" class="img-fluid rounded" src="Gallery/Uluwatu.jpg" alt="">
                                </div>
                                <div id="plan-desc" class="col">
                                    <p>
                                        Seminyak Beach Tour
                                        <br> <span style='font-size: 14px;'>Seminyak, Bali</span>
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
                                        <div>
                                            <span class="text-white rounded px-3 py-1 status approved">Approved</span>
                                        </div>
                                        <button id="paymentbutton" class="btn btn-secondary mt-3">Upload Payment Proof</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container d-flex justify-content-center mt-4 mb-4">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button id='arrow-button' type="button" class="btn btn-primary"><i  class="bi bi-arrow-left" style="font-size: 1rem;"></i></button>
                        <button id="num-button" type="button" class="btn btn-secondary">1</button>
                        <button id="num-button" type="button" class="btn btn-secondary">2</button>
                        <button id="num-button" type="button" class="btn btn-secondary">3</button>
                        <button id='arrow-button'  type="button" class="btn btn-primary"><i class="bi bi-arrow-right" style="font-size: 1rem;"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection