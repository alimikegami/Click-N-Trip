@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
@endsection
@section('body')
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
                    <h3 class="mb-3 mt-sm-4 mt-md-4">Payment Method</h3>
                        <div id="trip-inside-container" class="container">
                            <a href="/payment-method/bca"><div id="methods" class="border py-3 px-4">
                                <img src="../Gallery/bca 2.png"  alt="" class="img-fluid">
                                <span clas>BCA</span>
                            </div></a>
                            <a href="/payment-method/bni"><div id="methods" class="border py-3 px-4">
                                <img src="../Gallery/bni 1.png"  alt="" class="img-fluid">
                                <span clas>BNI</span>
                            </div></a>
                            <a href="/payment-method/mandiri"><div id="methods" class="border py-3 px-4">
                                <img src="../Gallery/mandiri 1.png"  alt="" class="img-fluid">
                                <span clas>Mandiri</span>
                            </div></a>
                            <a href="/payment-method/indomaret"><div id="methods" class="border py-3 px-4">
                                <img src="../Gallery/indomaret 1.png"  alt="" class="img-fluid">
                                <span clas>Indomaret</span>
                            </div></a>
                            <a href="/payment-method/alfamart"><div id="methods" class="border py-3 px-4">
                                <img src="../Gallery/alfamart 1.png"  alt="" class="img-fluid">
                                <span>Alfamart</span>
                            </div></a>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection