@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-pages.css">
@endsection
@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-7">
                <div class="container">
                    <h1 id='page-title'>{{ $dayTripPlan->title }}</h1>
                    <div id='stars'>
                        <span id='star-text'>Rating {{ $dayTripPlan->star_count ? $dayTripPlan->star_count : 0 }} out of
                            5</span>
                        @if ($dayTripPlan->dayTripPlan)
                            @for ($i = 0; $i < (int)$dayTripPlan->star_count; $i++)
                                <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                            @endfor
                        @endif
                    </div>
                    <a class="user-name" href="/users/{{ $dayTripPlan->user->id }}">{{ $dayTripPlan->user->name }}</a>
                    <div class="row mt-2">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                                <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner rounded">
                              @php
                                 $i = 0;
                              @endphp
                              @foreach ($images as $item)
                                <div class="carousel-item {{ $i==0? "active":"" }}">
                                    <div
                                    style="
                                    width: 45rem;
                                    height: 20rem;
                                    background-image: url({{ asset('storage/day-trip/' . $item->image_path ) }});
                                    background-size:cover;
                                    background-position:center;" 
                                    class="col-lg-4 col-md-4">
                                    </div>
                                    @php
                                        $i += 1;
                                    @endphp
                                </div>
                              @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              </a>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p id='desc-title'>Description</p>
                        <p id="desc-content">
                            {{ $dayTripPlan->description }}
                        </p>
                    </div>
                    <!-- review box -->
                    <div class="mt-3 mb-5">
                        <p id="desc-title">Review About this Day Trip</p>
                        @foreach ($reviews as $review)
                            <div class="container" id="review-display">
                                <i class="bi bi-person-circle" style="font-size: 1.5rem; color:black;"><span
                                        style="font-style:normal;" class="px-2"
                                        id="desc-content">{{ $review->name }}</span></i>
                                <div class="container" id="review-display">
                                    <div class="container border rounded">
                                        @for ($i = 0; $i < $review->star_count; $i++)
                                            <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                                        @endfor
                                        <p id="desc-content">{{ $review->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container-fluid" id="inner-container-right">
                    <h1 id="price">IDR.{{ $dayTripPlan->price_per_day }}/Person</h1>
                    @if (Auth::id() != $dayTripPlan->user->id)
                        <div id='book-trip-container' class="container-fluid border mt-3">
                            @if (Auth::user())
                                <p class="text-center pt-3">Book This Day Trip</p>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <label for="person">Person</label>
                                    </div>
                                    <div class="col">
                                        <input class="form-control book-form" type="number" id="person"
                                            name="numberOfPerson" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <label for="date">Date</label>
                                    </div>
                                    <div class="col">
                                        <input class="form-control book-form" type="date" id="date" name="date" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <button id='check-button' type="button" class="btn btn-primary mt-3 mb-2"
                                        onclick="checkInput()">Check Availibility
                                    </button>
                                    <a href="/payment-method" id="check-button" class="btn btn-secondary mt-3 mb-4">
                                        Our Payment Method
                                    </a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                                            <i onclick="closeConfirmationModal()" type='button' data-dismiss="modal" aria-label="Close"
                                                class="px-2 bi bi-x xbutton2"></i>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to book this trip?
                                        </div>
                                        <div class="modal-footer">
                                            <button onclick="closeConfirmationModal()" type="button" class="btn btn-primary" id="redbutton"
                                                data-dismiss="modal">No</button>
                                            <button type="button" class="btn btn-primary" id="greenbutton"
                                                onclick="event.preventDefault(); return book('{{ $dayTripPlan->id }}');">Book
                                                Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div>
                                <div class="container mt-3">
                                    <div class="d-flex justify-content-center">
                                        <span id="desc-title" class="text-center">Log In To Book This Trip!</span>
                                    </div>
                                    <a href='{{ route('login') }}' class="d-grid gap-2 pb-3 pt-4">
                                        <button  type="button" class="btn btn-primary">Log In</button>
                                    </a>
                                </div>
                                <hr>
                                <div class="container mt-3 mb-3">
                                    <div class="d-flex justify-content-center">
                                        <span id="desc-title" class="text-center">Don't have an account?</span>
                                    </div>
                                    <a href='{{ route('register') }}' class="d-grid gap-2 pb-3 pt-4">
                                        <button  type="button" class="btn btn-secondary">Sign Up</button>
                                    </a>
                                </div>
                            </div> 
                    @endif
                </div>
                @endif
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
                                    <td>
                                        <p class=' text-center schedule-text content'>
                                            {{ $dayTripDetails->start_time }}</p>
                                    </td>
                                    <td>
                                        <p class=' text-center schedule-text content'>{{ $dayTripDetails->end_time }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class=' text-center schedule-text'>{{ $dayTripDetails->agenda }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reservation Success</h5>
                    <button type="button" class="btn-close" onclick="window.location.reload(true);"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Your reservation has been made. Now wait for the tour guide to
                    respond to your reservation!
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.reload(true);" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="unavailableModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unable To Book</h5>
                    <button onclick="window.location.reload(true);" type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The reservation on that date is full!
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.reload(true);" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkInput() {
            let person = document.getElementById("person").value;
            let date = document.getElementById("date").value;
            if (person != "" && date != "") {
                $('#confirmationModal').modal('show');
            } else {
                alert('Please fill in the inputs!');
            }
        }
        function closeConfirmationModal($id) {
            $('#confirmationModal').modal('hide');
        }

        function book(id) {
            let person = document.getElementById("person").value;
            let date = document.getElementById("date").value;
            const data = {
                day_trip_plan_id: id,
                person: person,
                date: date,
            };

            const options = {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            }

            fetch('http://127.0.0.1:8000/day-trips/book', options)
                .then(response => response.json())
                .then(data => {
                    if (data.status === "reservation has been made") {
                        $('#confirmationModal').modal('hide');
                        $('#successModal').modal('show');
                    } else if (data.status === "invalid") {
                        $('#confirmationModal').modal('hide');
                        $('#unavailableModal').modal('show');
                    }
                })
        }
    </script>

@endsection
