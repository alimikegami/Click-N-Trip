@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/search-result.css">
@endsection
@section('body')
@include('components.navbar')
<div class="container-fluid">
    <div class="container" id='section-container'>
        <form id = "search-column" class="col">
            <div class="input-group pb-5">
                <input type="text" class="form-control" placeholder="Search Your Destination..." aria-label="SearchLabel"/>
                <div id='SearchButton'>
                    <button class='btn btn-primary' type='submit' >
                        <i class="bi bi-search" style="font-size: 1.5rem; color:white;"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>  
</div>
<div class="container-fluid">
    <div class="container mb-3" id='section-container'>
        <p>Showing Results for "Seminyak"</p>
    </div>
    <div class="container" id='section-container'>
        <div class="container border rounded mb-3">
            <div class="row mt-2 mb-2">
                <div class="col-lg-3 col-md-3">
                    <img class="img-fluid rounded" src="Gallery/Uluwatu.jpg" alt="">
                </div>
                <div class="col-lg">
                    <p>
                        Seminyak Beach Tour 
                        <br> <span style='font-size: 14px;'>Seminyak, Bali</span>
                        <br> <span style='font-size: 14px;'> <a href="#">Pasha Renaisan</a></span>
                    </p> 
                    <div class="pt-3" id='stars'>
                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                        <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                        <span id='star-text'>5 out of 5</span>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-lg-end">
                        <p>IDR. 150.000,00 /Person</p>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-center mt-4 mb-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary"><i class="bi bi-arrow-left" style="font-size: 1rem; color:white;"></i></button>
                    <button type="button" class="btn btn-secondary">1</button>
                    <button type="button" class="btn btn-secondary">2</button>
                    <button type="button" class="btn btn-secondary">3</button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-arrow-right" style="font-size: 1rem; color:white;"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection