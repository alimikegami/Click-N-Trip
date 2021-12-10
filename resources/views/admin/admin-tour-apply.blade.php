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
                        <button class="btn btn-primary">View</button> 
                    </td>
                    <td>
                        <button class="btn btn-primary" id="redbutton">Ban</button> 
                    </td>
                </tr>
                @endforeach
                  
            </tbody>
        </table>
    </div>
 
</div>
@endsection