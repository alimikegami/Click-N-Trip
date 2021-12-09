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
                    <h3 class="mb-3 mt-sm-4 mt-md-4">Transaction History</h3>
                    @foreach ($history as $item)
                    <div id="trip-outside-container" class="container border rounded mt-3">
                        <div id="trip-inside-container" class="container">
                            <div class="row mt-3 mb-3">
                                <div id="image-holder" class="col-lg-5 col-md-5">
                                    <img id="image" class="img-fluid rounded" src="Gallery/Uluwatu.jpg" alt="">
                                </div>
                                <div id="plan-desc" class="col">
                                    <p>
                                        {{ $item->title }}
                                        <br> <span style='font-size: 14px;'>{{ $item->destination }}</span>
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
                                            <span class="text-white rounded px-3 py-1 status approved">
                                                @if ($item->status == 0)
                                                    Pending
                                                @endif
                                                @if ($item->status == 1)
                                                    Approved
                                                @endif
                                                @if ($item->status == 2)
                                                    Rejected
                                                @endif
                                                @if ($item->status == 3)
                                                    Reserved
                                                @endif
                                            </span>
                                        </div>
                                        @if ($item->status == 1)
                                            <button id="paymentbutton" class="btn btn-secondary mt-3" onclick="showFileUploadModal({{ $item->id }})">Upload Payment
                                                Proof</button>
                                        @endif
                                        @if ($item->status == 3)
                                            <button id="reviewbutton" class="btn btn-secondary mt-3">Leave a Review</button>
                                        @endif

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="modal fade" id="paymentUploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload Your Proof Of Payment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
        function showFileUploadModal($id){
            $('#paymentUploadModal').modal('show');
            document.getElementById('submitButton').dataset.id = $id;
        }

        function uploadPaymentProof(){
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
