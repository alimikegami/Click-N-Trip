@extends('layouts.main-layout')
@section('body')
    <!-- Landing Page Starts Here -->
    <!-- Header Section -->
    <div class="header container-fluid d-flex justify-content-center" id='landing-header'>
        <form action="{{ route('search') }}" id="search-column" class="col">
            @csrf
            <div class="input-group pt-5 pb-5">
                <input type="text" class="form-control" name="search" placeholder="Search Your Destination..."
                    aria-label="SearchLabel" />
                    <button class='btn btn-primary' id="search-icon" type='submit'>
                        <i class="bi bi-search" style="font-size: 1.5rem; color:white;"></i>
                    </button>
            </div>
        </form>
    </div>
    <!-- Benefits Section -->
    <div class="benefits-section container">
        <div class="row">
            <h2 class="text-center mt-5 mb-5">Why Use Click n Trip?</h2>
            <div class="col-lg pt-1 text-center benefits-item">
                <h3 class="pb-1">Easy to Use</h3>
                <i class="bi bi-check2-square" style="font-size: 7rem; color:black;"></i>
                <p class="pt-2">Our service provides ease of use and easy access for our customer</p>
            </div>
            <div class="col-lg pt-1 text-center benefits-item">
                <h3 class="pb-1">Fast</h3>
                <i class="bi bi-lightning-charge-fill" style="font-size: 7rem; color:black;"></i>
                <p class="pt-2">Using Click-n-Trip you will get tour guide for your travels fast</p>
            </div>
            <div class="col-lg pt-1 text-center benefits-item">
                <h3 class="pb-1">Efficient</h3>
                <i class="bi bi-graph-up" style="font-size: 7rem; color:black;"></i>
                <p class="pt-2">Click-n-Trip keeps all form of transactions using our services as efficient as
                    possible</p>
            </div>
        </div>
    </div>
    <!-- Ad Section -->
    <div class="container-fluid">
        <h2 class='text-left mb-5 mt-5'>Hot Deals</h2>
        <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <img src="Gallery/Surabaya.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Suramadu full Tour</h5>
                            <p class="card-text text-center">IDR.599.000,00</p>
                            <div class="d-flex justify-content-center">
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card">
                        <img src="Gallery/Uluwatu.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Seminyak Beach Full Tour</h5>
                            <p class="card-text text-center">IDR.599.000,00</p>
                            <div class="d-flex justify-content-center">
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card">
                        <img src="Gallery/baligirls.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Nusa Penida Full Tour</h5>
                            <p class="card-text text-center">IDR.599.000,00</p>
                            <div class="d-flex justify-content-center">
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                                <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Destination Section -->
    <div class="container-fluid">
        <h2 class='text-left mb-5 mt-5'>Top Destination Nowadays</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col mb-3">
                    <div class="card"">
          <img src=" Gallery/Surabaya.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Surabaya</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card">
                        <img src="Gallery/Uluwatu.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bali</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card">
                        <img src="Gallery/baligirls.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nusa Penida</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="container-fluid mt-5" id="landing-footer">
        <h3>Contact Us!</h3>
        <ul class="pb-5">
            <li>Instagram</li>
            <li>Facebook</li>
            <li>Whats-App</li>
        </ul>
    </div>
@endsection
