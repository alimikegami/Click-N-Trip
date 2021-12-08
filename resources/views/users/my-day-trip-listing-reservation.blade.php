@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/day-trip-listing.css') }}">
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
                    <h3 class="mb-3 mt-sm-4 mt-md-4">Reservation</h3>
                    <div id="trip-outside-container" class="container border rounded">
                        <div id="trip-inside-container" class="container">
                            <div class="row mt-3 mb-3">
                                <div id="image-holder" class="col-lg-4 col-md-4">
                                    <img id="image" class="img-fluid rounded" src="{{ asset('Gallery/Uluwatu.jpg') }}"
                                        alt="">
                                </div>
                                <div id="plan-desc" class="col">
                                    <p>
                                        {{ $dayTripPlan[0]->title }}
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
                                        <a href=""><i class="bi bi-pencil-square border me-2 px-2"
                                                style="font-size: 1.7rem; color:black;"></i></a>
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
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($reservation as $item)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>alimikegami1@gmail.com</td>
                                        <td>{{ $item->person }}</td>
                                        <td>{{ $item->reservation_date }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a type="button" onclick="showApprovalModal({{ $item->id }})"
                                                class="ps-3"><i class="bi bi-check-square-fill"
                                                    style="font-size: 1.7rem; color:#2BE048;"></i></a>
                                            <a type="button" onclick="showRejectModal({{ $item->id }})"
                                                class="ps-3"><i class="bi bi-x-square-fill"
                                                    style="font-size: 1.7rem; color:#FF0000;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                    <div class="container d-flex justify-content-center mt-5 mb-4">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button id='arrow-button' type="button" class="btn btn-primary"><i class="bi bi-arrow-left"
                                    style="font-size: 1rem;"></i></button>
                            <button id="num-button" type="button" class="btn btn-secondary">1</button>
                            <button id="num-button" type="button" class="btn btn-secondary">2</button>
                            <button id="num-button" type="button" class="btn btn-secondary">3</button>
                            <button id='arrow-button' type="button" class="btn btn-primary"><i class="bi bi-arrow-right"
                                    style="font-size: 1rem;"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approval</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve this reservation?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="approveButton"
                        onclick="updateStatus(1)">Approve</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to reject this reservation?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="rejectButton"
                        onclick="updateStatus(2)">Reject</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reservation Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Action completed!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="failModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unable To Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Action was unsuccesfull!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateStatus(state) {
            if (state === 1) {
                const dataButton = document.querySelector('#approveButton');
                var id = dataButton.dataset.id;
            } else {
                const dataButton = document.querySelector('#rejectButton');
                var id = dataButton.dataset.id;
            }

            const data = {
                status: state,
            };

            const options = {
                method: 'PATCH',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    '_method': 'PATCH',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            };

            fetch('http://127.0.0.1:8000/day-trips/reservation/' + id, options)
                .then(response => response.json())
                .then(data => {
                    $('#approvalModal').modal('hide');
                    $('#rejectModal').modal('hide');
                    if (data.status === "success") {

                        $('#successModal').modal('show');
                    } else {
                        $('#confirmationModal').modal('hide');
                        $('#failModal').modal('show');
                    }
                });
        }

        function showApprovalModal($id, $dayTripid) {
            console.log($id);
            console.log($dayTripid);
            $('#approvalModal').modal('show');
            document.getElementById('approveButton').dataset.id = $id;
        }

        function showRejectModal($id, $dayTripid) {
            $('#rejectModal').modal('show');
            document.getElementById('rejectButton').dataset.id = $id;
        }

        $(document).ready(function() {
            $('#successModal').on('hidden.bs.modal', function() {
                location.reload();
            })

            $('#failModal').on('hidden.bs.modal', function() {
                location.reload();
            })
        });
    </script>
@endsection
