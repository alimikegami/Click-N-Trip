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
                @foreach ($applications as $application)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->address }}</td>
                    <td>{{ $application->province }}</td>
                    <td>{{ $application->nik }}</td>
                    <td>
                        <button class="btn btn-primary" onclick="showPic('{{ $application->selfie_with_ktp }}')">View</button> 
                    </td>
                    <td>
                        <a href="" class="ps-3"><i class="bi bi-check-square-fill" style="font-size: 1.7rem; color:#2BE048;"></i></a>
                        <a href="" class="ps-3"><i class="bi bi-x-square-fill" style="font-size: 1.7rem; color:#FF0000;"></i></a>
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


<script>
    function showPic(imgPath){
        let path = "http://127.0.0.1:8000/storage/selfie-ktp/" + imgPath;
        console.log(path);
        document.getElementById("applicationImg").src = path;
        $('#applicationModal').modal('show');
    }
</script>
@endsection