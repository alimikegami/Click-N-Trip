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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <h1 class="mb-3">Pending Payment List</h1>
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
                @foreach ($payments as $item)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $item->reservation_date }}</td>
                    <td>hans@gmail.com</td>
                    <td>{{ $item->title }}</td>
                    <td>IDR{{ $item->price_per_day }}</td>
                    <td>
                        <button class="btn btn-primary" onclick="showImages('{{ $item->payment_image_path }}')">View</button> 
                    </td>
                    <td>
                        <a type="button" class="ps-3"><i class="bi bi-check-square-fill" style="font-size: 1.7rem; color:#2BE048;"></i></a>
                        <a type="button" class="ps-3"><i class="bi bi-x-square-fill" style="font-size: 1.7rem; color:#FF0000;"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 
</div>

<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    function showImages(imgPath){
        let path = "http://127.0.0.1:8000/storage/payment-proof/" + imgPath;
        console.log(path);
        document.getElementById("applicationImg").src = path;
        $('#paymentModal').modal('show');
    }

    
</script>
@endsection