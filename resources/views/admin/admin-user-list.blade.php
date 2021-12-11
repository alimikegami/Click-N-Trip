@extends('layouts.admin-layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('../css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/day-trip-listing.css') }}">
@endsection
@section('body')
    <div class="wrapper">
        @include('components.navbar-admin')
        <div class="container mt-3">
            <h1 class="mb-3">User List</h1>
            <table class="table admin-table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                @if ($user->is_blocked == 0)
                                    <button class="btn btn-primary" id="redbutton"
                                        onclick="showConfirmationModalBlock('{{ $user->id }}')">Block</button>
                                @else
                                    <button class="btn btn-primary" id="greenbutton"
                                        onclick="showConfirmationModalUnblock('{{ $user->id }}')">Unblock</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confirmationModalBlock" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                    <i type='button' data-dismiss="modal" aria-label="Close" class="px-2 bi bi-x xbutton2"></i>
                </div>
                <div class="modal-body">
                    Do you want to block this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="close" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="blockButton"
                        onclick="fetchUserStatus(1)">Block</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confirmationModalUnblock" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                    <i type='button' data-dismiss="modal" aria-label="Close" class="px-2 bi bi-x xbutton2"></i>
                </div>
                <div class="modal-body">
                    Do you want to unblock this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="close" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="unblockButton"
                        onclick="fetchUserStatus(0)">Unblock</button>
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
        function showConfirmationModalBlock(id) {
            $('#confirmationModalBlock').modal('show');
            document.getElementById('blockButton').dataset.id = id;
        }

        function showConfirmationModalUnblock(id) {
            $('#confirmationModalUnblock').modal('show');
            document.getElementById('unblockButton').dataset.id = id;
        }

        function fetchUserStatus(status) {
            if (status == 1) {
                var dataButton = document.querySelector('#blockButton');
                var id = dataButton.dataset.id;
            } else {
                var dataButton = document.querySelector('#unblockButton');
                var id = dataButton.dataset.id;
            };

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

            fetch('http://127.0.0.1:8000/admins/users/block/' + id, options)
                .then(response => response.json())
                .then(data => {
                    if (status == 1) {
                        $('#confirmationModalBlock').modal('hide');
                    } else {
                        $('#confirmationModalUnblock').modal('hide');
                    }
                    if (data.status === "success") {
                        $('#successModal').modal('show');
                    } else {
                        $('#failModal').modal('show');
                    }
                });
        }

        (function() {
            console.log('hello');
            $('#successModal').on('hide', function() {
                console.log('tutup');
                window.location.href = window.location.href;
            })

            $('#failModal').on('hide', function() {
                window.location.href = window.location.href;
            })
        })();
    </script>
@endsection
