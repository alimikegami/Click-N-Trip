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
                    <h3 class="mb-3 mt-sm-4 mt-md-4">Reservation</h3>
                    <div id="trip-outside-container" class="container border rounded">
                        <div id="trip-inside-container" class="container">
                            <div class="row mt-3 mb-3">
                                <div id="image-holder" class="col-lg-4 col-md-4">
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
                                        <a href=""><i class="bi bi-pencil-square border me-2 px-2" style="font-size: 1.7rem; color:black;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id='reservation-list' class="mt-4">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Person</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>alimikegami1@gmail.com</td>
                                    <td>1</td>
                                    <td>11/16/2021</td>
                                    <td>
                                        <a href="" class="ps-3"><i class="bi bi-check-square-fill" style="font-size: 1.7rem; color:#2BE048;"></i></a>
                                        <a href="" class="ps-3"><i class="bi bi-x-square-fill" style="font-size: 1.7rem; color:#FF0000;"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>alimikegami1@gmail.com</td>
                                    <td>1</td>
                                    <td>11/16/2021</td>
                                    <td>
                                        <a href="" class="ps-3"><i class="bi bi-check-square-fill" style="font-size: 1.7rem; color:#2BE048;"></i></a>
                                        <a href="" class="ps-3"><i class="bi bi-x-square-fill" style="font-size: 1.7rem; color:#FF0000;"></i></a>
                                    </td>
                                </tr>
                                
                            </tbody>

                        </table>
                    </div>
                    <div class="container d-flex justify-content-center mt-5 mb-4">
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

    </div>

@endsection