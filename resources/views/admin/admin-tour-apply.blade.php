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
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Address</th>
                        <th scope="col">Province</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Foto KTP</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <h1 class="mb-3">Tour Guide Applicant List</h1>
                    <div style="max-width: 700px;">
                        <form class="pt-3">
                            <div class="input-group pb-3">
                                <input type="text" class="form-control" placeholder="Search data..."
                                    aria-label="SearchLabel" />
                                <div id='SearchButton'>
                                    <button id='search-icon' class='btn btn-primary' type='submit'>
                                        <i class="bi bi-search" style="font-size: 1.5rem;"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @foreach ($applications as $application)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $application->name }}</td>
                            <td>{{ $application->address }}</td>
                            <td>{{ $application->province }}</td>
                            <td>{{ $application->nik }}</td>
                            <td>
                                <button class="btn btn-primary"
                                    onclick="showPic('{{ $application->selfie_with_ktp }}')">View</button>
                            </td>
                            <td>
                                <a type="button" onclick="showApproveModal({{ $application->id }})"
                                    class="ps-3" onclick=""><i class="bi bi-check-square-fill"
                                        style="font-size: 1.7rem; color:#2BE048;"></i></a>
                                <a type="button" onclick="showRejectModal({{ $application->id }})"
                                    class="ps-3"><i class="bi bi-x-square-fill"
                                        style="font-size: 1.7rem; color:#FF0000;"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

    <div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unable To Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="application-img" id="applicationImg">
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
                    Are you sure you want to approve this application?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="approveButton"
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
                    Are you sure you want to reject this application?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="rejectButton"
                        onclick="fetchApproval(2)">Reject</button>
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
        function showPic(imgPath) {
            let path = "http://127.0.0.1:8000/storage/selfie-ktp/" + imgPath;
            console.log(path);
            document.getElementById("applicationImg").src = path;
            $('#applicationModal').modal('show');
        }

        function showApproveModal($id) {
            $('#approvalModal').modal('show');
            document.getElementById('approveButton').dataset.id = $id;
        }

        function showRejectModal($id) {
            $('#rejectModal').modal('show');
            document.getElementById('rejectButton').dataset.id = $id;
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

            fetch('http://127.0.0.1:8000/admins/tour-guide-application/' + id, options)
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
