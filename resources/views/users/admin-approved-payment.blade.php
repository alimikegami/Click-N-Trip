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
                    <th scope="col">Date</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ordered Plan</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Payment Details</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <h1 class="mb-3">Pending Payment List</h1>
                <tr>
                    <th scope="row">1</th>
                    <td>20/12/2021</td>
                    <td>hans@gmail.com</td>
                    <td>Full Package Seminyak Tour</td>
                    <td>IDR 599,000.00</td>
                    <td>
                        <button class="btn btn-primary">View</button> 
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>20/12/2021</td>
                    <td>hans@gmail.com</td>
                    <td>Full Package Seminyak Tour</td>
                    <td>IDR 599,000.00</td>
                    <td>
                        <button class="btn btn-primary">View</button> 
                    </td>
                </tr> 
            </tbody>
        </table>
    </div>
 
</div>
@endsection