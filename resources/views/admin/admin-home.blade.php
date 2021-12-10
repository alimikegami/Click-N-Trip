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
            <img id="image" class="img-fluid" src="Gallery/icon1.png" alt="">
            <h1 class="text-center mt-3">Welcome, Admin</h1>
        </div>
    </div>
 
</div>

@endsection