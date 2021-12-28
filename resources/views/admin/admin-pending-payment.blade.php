@extends('layouts.admin-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
@endsection
@section('body')
    <div class="wrapper">
        @include('components.navbar-admin')
        <div class="container mt-3">
            <table class="table admin-table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Date</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ordered Plan</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Payment Details</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <h1 class="mb-3">Pending Payment List</h1>

                    @foreach ($payments as $item)
                        <tr>
                            <td>{{ $item->reservation_date }}</td>
                            <td>hans@gmail.com</td>
                            <td>{{ $item->title }}</td>
                            <td>IDR{{ $item->price_per_day }}</td>
                            <td>
                                <button class="btn btn-primary"
                                    onclick="showImages('{{ $item->payment_image_path }}')">View</button>
                            </td>
                            <td>
                                <a type="button" onclick="showApproveModal('{{ $item->id }}')" class="ps-3"><i class="bi bi-check-square-fill"
                                        style="font-size: 1.7rem; color:#2BE048;"></i></a>
                                <a type="button" onclick="showRejectModal('{{ $item->id }}')" class="ps-3"><i class="bi bi-x-square-fill"
                                        style="font-size: 1.7rem; color:#FF0000;"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Proof</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid" src="" alt="application-img" id="applicationImg">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    Are you sure you want to approve this payment?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn greenbutton" id="approveButton"
                        onclick="fetchApproval(1)">Approve</button>
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
                    Are you sure you want to reject this payment?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn redbutton" id="rejectButton"
                        onclick="fetchApproval(0)">Reject</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approval Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Action completed!
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.reload(true);" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="failModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unable To Approve</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Action was unsuccesfull!
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.reload(true);" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showImages(imgPath) {
            let path = "http://127.0.0.1:8000/storage/payment-proof/" + imgPath;
            console.log(path);
            document.getElementById("applicationImg").src = path;
            $('#paymentModal').modal('show');
        }

        function showApproveModal(id) {
            $('#approvalModal').modal('show');
            document.getElementById('approveButton').dataset.id = id;
        }

        function showRejectModal(id) {
            $('#rejectModal').modal('show');
            document.getElementById('rejectButton').dataset.id = id;
        }

        function fetchApproval(status) {
            if (status === 1) {
                const dataButton = document.querySelector('#approveButton');
                var id = dataButton.dataset.id;
            } else {
                const dataButton = document.querySelector('#rejectButton');
                var id = dataButton.dataset.id;
            }

            const data = {
                status: status,
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

            fetch('http://127.0.0.1:8000/admins/reservation/' + id, options)
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
    </script>
@endsection
