@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
@endsection
@section('body')
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <ul class="list-unstyled components">
            <p><i class="bi bi-speedometer" style="font-size: 24px; color:white;"></i> <span class='py-4 fw-bold side-title'>Dashboard</span></p>
            <hr>
            <li>
                <a href="#"><i class="bi bi-briefcase-fill" style="font-size: 14px; color:white; padding-right: 0.5rem; margin-left:1.5rem;"></i><span class="fw-bold side-navlinks">Tour Guide Apllicant List</span></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-people-fill" style="font-size: 14px; color:white;padding-right: 0.5rem; margin-left:1.5rem;"></i><span class="fw-bold side-navlinks">User List</span></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-credit-card" style="font-size: 14px; color:white;padding-right: 0.5rem; margin-left:1.5rem;"></i><span class="fw-bold side-navlinks">Pending User Payment</span></a>
            </li>
            <li>
                <a href="#"><i class="bi bi-credit-card-fill" style="font-size: 14px; color:white;padding-right: 0.5rem; margin-left:1.5rem;"></i><span class="fw-bold side-navlinks">Approved User Payment</span></a>
            </li>
        </ul>
    </nav>
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mr.A</td>
                    <td>Jln.jalan-jalan no 2</td>
                    <td>Bali</td>
                    <td>190876789xxx</td>
                    <td>
                        <button class="btn btn-primary">View</button> 
                    </td>
                    <td>
                        <button class="btn btn-primary" id="redbutton">Ban</button> 
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mr.A</td>
                    <td>Jln.jalan-jalan no 2</td>
                    <td>Bali</td>
                    <td>190876789xxx</td>
                    <td>
                        <button class="btn btn-primary">View</button> 
                    </td>
                    <td>
                        <button class="btn btn-primary" id="redbutton">Ban</button> 
                    </td>
                </tr>
                  
            </tbody>
        </table>
    </div>
 
</div>
@endsection