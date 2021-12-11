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
                        <th scope="col">Date</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ordered Plan</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Payment Details</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <h1 class="mb-3">Approved Payment List</h1>
                    @foreach ($history as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $item->reservation_date }}</td>
                            <td>hans@gmail.com</td>
                            <td>{{ $item->title }}</td>
                            <td>IDR{{ $item->price_per_day }}</td>
                            <td>
                                <button class="btn btn-primary">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
