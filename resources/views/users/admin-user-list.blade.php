@extends('layouts.admin-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-listing.css">
@endsection
@section('body')
<div class="wrapper">
    @include('components.navbar-admin')
    <div class="container mt-3">
        <h1 class="mb-3">User List</h1>
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
        <table class="table admin-table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <th scope="row">1</th>
                    <td>Mr.A</td>
                    <td>A@gmail.com</td>
                    <td>User</td>
                    <td>
                        <button class="btn redbutton2" type="button" data-toggle="modal" data-target="#confirmationModal">Ban</button> 
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Mr.A</td>
                    <td>A@gmail.com</td>
                    <td>User</td>
                    <td>
                        <button class="btn redbutton2" type="button" data-toggle="modal" data-target="#confirmationModal">Ban</button> 
                            <!-- Modal -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                                    <i type='button' data-dismiss="modal" aria-label="Close" class="px-2 bi bi-x xbutton2"></i>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to ban this user?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="redbutton" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-primary" id="greenbutton">Ban</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                    </td>
                </tr>                   
            </tbody>
        </table>
        
    </div>
 
             
</div>
@endsection