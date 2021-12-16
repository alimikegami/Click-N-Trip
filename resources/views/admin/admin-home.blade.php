@extends('layouts.admin-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
@endsection
@section('body')
<div class="wrapper">
    @include('components.navbar-admin')
    <div class="container parent container d-flex justify-content-center align-items-center h-100">
        <div class="container mt-5" id="img-wrapper">
<<<<<<< HEAD
            <img id="image" class="img-fluid" src="../Gallery/icon1.png" alt="">
=======
            <img id="image" class="img-fluid" src="{{ asset('Gallery/icon1.png') }}" alt="">
>>>>>>> 3174d1ed8628c957e09db16eae869b6e139fa1e4
            <h1 class="text-center mt-3">Welcome, Admin</h1>
        </div>
    </div>
 
</div>

@endsection