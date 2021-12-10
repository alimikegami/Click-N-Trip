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
                        <button class="btn redbutton2">Ban</button> 
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
                        <button class="btn redbutton2">Ban</button> 
                    </td>
                </tr>
                  
            </tbody>
        </table>
    </div>
 
</div>
@endsection