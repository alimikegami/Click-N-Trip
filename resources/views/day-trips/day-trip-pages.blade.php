@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-pages.css">
@endsection
@section('body')
@include('components.navbar')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-7">
            <div class="container">
                <h1 id='page-title'>{{ $dayTripPlan->title }}</h1>
                <div id='stars'>
                    <span id='star-text'>Rating 4 out of 5</span>
                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                </div>
                <a href="/users/{{ $dayTripPlan->user->id }}">{{ $dayTripPlan->user->name }}</a>
                <div class="container-fluid mt-3" id='img-container'>
                </div>
                <div class="mt-3">
                    <p id = 'desc-title'>Description</p>
                    <p id="desc-content">
                        {{ $dayTripPlan->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container-fluid" id="inner-container-right">
                <h1 id="price">IDR.{{ $dayTripPlan->price_per_day }}/Person</h1>
                <div id='book-trip-container' class="container-fluid border mt-3">
                    <p class="text-center pt-3">Book This Day Trip</p>
                    <form class="mt-3" action="">
                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="person">Person</label>
                            </div>
                            <div class="col">
                                <input class="form-control book-form" type="number" id="person" name="numberOfPerson">
                            </div>
                        </div>
                        <div class="row mb-3">   
                            <div class="col-2">
                                <label for="date">Date</label>
                            </div>
                            <div class="col">
                                <input class="form-control book-form" type="date" id="date" name="date">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button id='check-button' type="submit" class="btn btn-primary mt-3 mb-5">Check Availibility</button>
                        </div>
                    </form>
                </div>
            </div>    
            <div class="container-fluid mt-3" id="inner-container-right">
                <p id="desc-title">Schedule</p>
                <div class="container-fluid border mb-5" id='table-container'>
                    <table class="container mt-3">
                        <thead>
                          <tr>
                            <th class="text-center schedule-text" scope="col">Time Start</th>
                            <th class="text-center schedule-text" scope="col">Time End</th>
                            <th class="text-center schedule-text" scope="col">Agenda</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dayTripPlan->dayTripDetails as $dayTripDetails)
                            <tr>
                                <td> <p class=' text-center schedule-text content'>{{ $dayTripDetails->start_time }}</p></td>
                                <td> <p class=' text-center schedule-text content'>{{ $dayTripDetails->end_time }}</p></td>
                                <td> <p class=' text-center schedule-text'>{{ $dayTripDetails->agenda }}</p></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
 
                </div>

            </div>
        </div>
    </div>
</div>

@endsection