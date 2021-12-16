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
    <!-- Top Destination Section -->
    <div class="container-fluid">
        <h2 class='text-center mb-5 mt-5'>Top Destination Nowadays</h2>
        <div class="container-fluid">
            <div class="row">
                <a href="/day-trips/search?search=surabaya" class="col mb-3">
                    <div class="card" id="zoom-element">
                        <img src=" Gallery/Surabaya.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Surabaya</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
                <a class="col mb-3" href="/day-trips/search?search=bali">
                    <div class="card" id="zoom-element">
                        <img src="Gallery/Uluwatu.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bali</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
                <a class="col mb-3" href="/day-trips/search?search=nusa%20penida">
                    <div class="card" id="zoom-element">
                        <img src="Gallery/baligirls.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nusa Penida</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Ad Section -->
    <div class="container-fluid">
        <h2 class='text-center mb-5 mt-5'>Hot Deals</h2>
        <div class="container-fluid">
            <div class="row">
                @foreach ($featured as $item)
                    <a href="/day-trips/{{ $item->id }}" class="col mb-3">
                        <div style="max-width:33rem;max-height:40rem;color:white" class="col card" id="zoom-element">
                            <div class="card-img-top" style="
                                            border:none;
                                            height:20rem;
                                            background-image: url({{ asset('storage/day-trip/' . $item->image_path) }});
                                            background-size:cover;
                                            background-position:center;
                                        ">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $item->title }}</h5>
                                <p class="card-text text-center">IDR{{ $item->price_per_day }}</p>
                                <div class="d-flex justify-content-center">
                                    @if ($item->star_count)
                                        @for ($i = 0; $i < $item->star_count; $i++)
                                            <i class="bi bi-star-fill" style="font-size: 2rem; color:gold;"></i>

                                        @endfor
                                    @else
                                        <p>No ratings yet</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
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
    <!-- Footer Section -->
    <div class="container-fluid mt-5" id="landing-footer">
        <div class="container d-flex justify-content-center" id="footer-inner">
            <div class="row">
                <div class="col pt-5 pb-5">
                    <h3 class="pb-2 px-5">About Click n Trip</h3>
                    <p class="px-5"><a id='footer-links' href="">Click n Trip</a> is the online solution for your
                        tour guides needs!</p>

                </div>
                <div class="col pt-5 pb-5">
                    <h3 class="pb-2 px-5">Get Your Day Trip Now</h3>
                    <p class="px-5">Click n Trip provides <a id='footer-links' href="">day trips</a> from our
                        travel guides/agencies for customer needs!</p>

                </div>
                <div class="col pt-5 pb-5">
                    <h3 class="pb-2 px-5">Connect With Us</h3>
                    <div class="container">
                        <div class="row px-4">
                            <div class="col">
                                <a href=""><i id="contact-logo" class="bi bi-instagram px-3 py-2"
                                        style="font-size: 2rem; "></i> </a>
                            </div>
                            <div class="col">
                                <a href=""><i id="contact-logo" class="bi bi-facebook px-3 py-2"
                                        style="font-size: 2rem; "></i> </a>
                            </div>
                            <div class="col">
                                <a href=""><i id="contact-logo" class="bi bi-whatsapp px-3 py-2"
                                        style="font-size: 2rem;"></i></a>
                            </div>
                            <div class="col">
                                <a href=""><i id="contact-logo" class="bi bi-twitter px-3 py-2"
                                        style="font-size: 2rem;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
