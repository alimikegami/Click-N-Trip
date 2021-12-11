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
                        <button class="btn btn-primary" onclick="showPic({{ $application->selfie_with_ktp }})">View</button> 
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


<script>
    
</script>
@endsection