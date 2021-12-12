@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
    <link rel="stylesheet" href="../css/day-trip-pages.css">
@endsection
@section('body')
    <div id="outer-container" class="container">
        <div class="row">
            @include('components.my-profile')
            <div class="col">
                <div class="container-fluid" id="trip-container">
                    <h3 class="mb-3 mt-sm-4 mt-md-4">Transaction History</h3>
                    @foreach ($history as $item)
                        <div id="trip-outside-container" class="container border rounded mt-3">
                            <div id="trip-inside-container" class="container">
                                <div class="row mt-3 mb-3">
                                    <div id="image-holder" class="col-lg-5 col-md-5">
                                        <img id="image" class="img-fluid rounded" src="{{ asset('storage/day-trip/' . $item->image_path) }}" alt="">
                                    </div>
                                    <div id="plan-desc" class="col">
                                        <p>
                                            {{ $item->title }}
                                            <br> <span style='font-size: 14px;'>{{ $item->destination }}</span>
                                        </p>
                                        <div id="list-buttons" class="pt-3">
                                            <div>
                                                <span class="text-white rounded px-3 py-1 status approved">
                                                    @if ($item->status == 0)
                                                        Pending
                                                    @endif
                                                    @if ($item->status == 1)
                                                        Reservation Approved
                                                    @endif
                                                    @if ($item->status == 2)
                                                        Reservation Rejected
                                                    @endif
                                                    @if ($item->status == 3)
                                                        Reserved
                                                    @endif
                                                    @if ($item->status == 4)
                                                        Payment Rejected
                                                    @endif
                                                </span>
                                            </div>
                                            @if ($item->status == 1)
                                                <button id="paymentbutton" class="btn btn-secondary mt-3"
                                                    onclick="showFileUploadModal({{ $item->id }})">Upload Payment
                                                    Proof</button>
                                            @endif
                                            @if ($item->status == 4)
                                                <button id="paymentbutton" class="btn btn-secondary mt-3"
                                                    onclick="showFileUploadModal({{ $item->id }})">Edit Payment
                                                    Proof</button>
                                            @endif
                                            @if ($item->status == 3 && $item->is_reviewed == 0)
                                                <button type="button" onclick="showReviewModal('{{ $item->id }}')">Leave
                                                    a Review</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal fade" id="paymentUploadModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload Your Proof Of Payment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="proofOfPayment" class="col-form-label">Proof Of Payment</label>
                                    <input type="file" class="form-control" name="proofImg" id="proofOfPayment">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="submitButton"
                                    onclick="uploadPaymentProof()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container d-flex justify-content-center mt-4 mb-4">
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

    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <form class="mt-3">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Review</h5>
                        <i type='button' data-dismiss="modal" aria-label="Close" class="px-2 bi bi-x xbutton2"></i>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <span id="star-container">
                                <input class="rate" value="5" type="radio" name="rate" id="rate-1">
                                <label id="rating-stars-empty" for="rate-1" class="bi bi-star-fill"></label>
                                <input class="rate" value="4" type="radio" name="rate" id="rate-2">
                                <label id="rating-stars-empty" for="rate-2" class="bi bi-star-fill"></label>
                                <input class="rate" value="3" type="radio" name="rate" id="rate-3">
                                <label id="rating-stars-empty" for="rate-3" class="bi bi-star-fill"></label>
                                <input class="rate" value="2" type="radio" name="rate" id="rate-4">
                                <label id="rating-stars-empty" for="rate-4" class="bi bi-star-fill"></label>
                                <input class="rate" value="1" type="radio" name="rate" id="rate-5">
                                <label id="rating-stars-empty" for="rate-5" class="bi bi-star-fill"></label>
                            </span>
                        </div>
                        <textarea class="form-control" name="description" id="description" placeholder='Review Goes Here'
                            required style="min-height: 100px;"></textarea>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button onclick="showConfirmationModal()" id="submitReview" type="button"
                            class="btn btn-primary">Submit
                            Review</button>
                    </div>
                </div>
            </form>
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
                    Are you sure you want to post this review?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="approveButton"
                        onclick="fetchReview()">Approve</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reservation Success</h5>
                    <button onclick="window.location.reload(true);" type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Action completed!
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.reload(true);" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="failModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unable To Book</h5>
                    <button onclick="window.location.reload(true);" type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Action was unsuccesfull!
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.reload(true);" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var review = "";
        var currentId;
        var rate;

        function showFileUploadModal(id) {
            $('#paymentUploadModal').modal('show');
            document.getElementById('submitButton').dataset.id = id;
        }

        function uploadPaymentProof() {
            let formData = new FormData();
            const dataButton = document.querySelector('#submitButton');
            let id = dataButton.dataset.id;
            formData.append('proofImg', $('#proofOfPayment')[0].files[0]);
            formData.append("_method", "PATCH")
            const options = {
                method: 'POST',
                body: formData,
                headers: {
                    '_method': 'PATCH',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            };

            fetch('http://127.0.0.1:8000/day-trips/reservation/proof/' + id, options)
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        $('#paymentUploadModal').modal('hide');
                        $('#successModal').modal('show');
                    } else {
                        $('#paymentUploadModal').modal('hide');
                        $('#failModal').modal('show');
                    }
                });
        }

        function showReviewModal(id) {
            $('#reviewModal').modal('show');
            currentId = id;
        }

        function showConfirmationModal() {
            review = $('textarea#description').val();;
            $('#reviewModal').modal('hide');
            $('#approvalModal').modal('show');
        }

        function fetchReview() {
            console.log(rate);
            const data = {
                review_count: rate,
                review_content: review,
            };

            const options = {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            };
            fetch('http://127.0.0.1:8000/day-trips/' + currentId + '/review', options)
                .then(response => response.json())
                .then(data => {
                    $('#approvalModal').modal('hide');
                    if (data.status === "success") {
                        $('#successModal').modal('show');
                    } else if (data.status === "invalid") {
                        $('#failModal').modal('show');

                    }
                })
        }

        $(document).ready(function() {
            $('#successModal').on('hidden.bs.modal', function() {
                window.location.reload(true)
            })

            $('#failModal').on('hidden.bs.modal', function() {
                window.location.reload(true)
            })

            $('#star-container input[type="radio"]').click(function() {
                rate = $(this).val();
                console.log(rate);
            });
        });
    </script>
@endsection
