@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/day-trip-pages.css">
@endsection
@section('body')
@include('components.navbar')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-7">
            <div class="container">
                <h1 id='page-title'>Seminyak Beach Tour</h1>
                <div id='stars'>
                    <span id='star-text'>Rating 4 out of 5</span>
                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                </div>
                <a href="#">Pasha Renaisan</a>
                <div class="container-fluid mt-3" id='img-container'>
                </div>
                <div class="mt-3">
                    <p id = 'desc-title'>Description</p>
                    <p id="desc-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus molestias cupiditate pariatur odio hic ab, doloremque sed expedita veritatis, facere perspiciatis suscipit eligendi! Facilis aut fugiat incidunt ad laudantium explicabo!
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia saepe libero assumenda temporibus obcaecati enim tempore quidem? Natus, aut illo labore vero incidunt alias voluptatum obcaecati beatae explicabo optio vitae.
                    </p>
                    <p id="desc-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto enim facilis hic voluptas dolorem amet impedit sequi modi, id iure libero odio placeat doloremque aspernatur ab dolorum ipsa explicabo quo?
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias quia culpa inventore, quisquam illo hic corrupti iure dolore quaerat saepe voluptatem perferendis exercitationem illum numquam sequi eius maxime facilis corporis!
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container-fluid" id="inner-container-right">
                <h1 id="price">IDR.150.000,00/Person</h1>
                <div id='book-trip-container' class="container-fluid border mt-3">
                    <p class="text-center pt-3">Book This Day Trip</p>
                    <form class="mt-3" action="">
                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="person">Person</label>
                            </div>
                            <div class="col">
                                <input class="form-control book-form" type="number" id="person" name="person" value="5">
                            </div>
                        </div>
                        <div class="row mb-3">   
                            <div class="col-2">
                                <label for="date">Date</label>
                            </div>
                            <div class="col">
                                <input class="form-control book-form" type="date" id="date" name="person">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button id='check-button' type="button" class="btn btn-primary mt-3 mb-5" data-toggle="modal" data-target="#confirmationModal">Check Availibility</button>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                                    <i type='button' data-dismiss="modal" aria-label="Close" class="px-2 bi bi-x xbutton2"></i>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to book this trip?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="redbutton" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-primary" id="greenbutton">Book Now</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
            <div class="container-fluid mt-3" id="inner-container-right">
                <p id="desc-title">Schedule</p>
                <div class="container-fluid border mb-5" id='table-container'>
                    <table class="container mt-3">
                        <thead>
                          <tr>
                            <th class="text-center schedule-text" scope="col">Time Start</th>
                            <th class="text-center schedule-text" scope="col">Time End</th>
                            <th class="text-center schedule-text" scope="col">Agenda</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> <p class=' text-center schedule-text content'>8.00</p></td>
                            <td> <p class=' text-center schedule-text content'>9.00</p></td>
                            <td> <p class=' text-center schedule-text'>Visit Seminyak</p></td>
                          </tr>
                          <tr>
                            <td> <p class=' text-center schedule-text content'>8.00</p></td>
                            <td> <p class=' text-center schedule-text content'>9.00</p></td>
                            <td> <p class=' text-center schedule-text'>Visit Seminyak</p></td>
                          </tr>
                          <tr>
                            <td> <p class=' text-center schedule-text content'>8.00</p></td>
                            <td> <p class=' text-center schedule-text content'>9.00</p></td>
                            <td> <p class=' text-center schedule-text'>Visit Seminyak</p></td>
                          </tr>
                          <tr>
                            <td> <p class=' text-center schedule-text content'>8.00</p></td>
                            <td> <p class=' text-center schedule-text content'>9.00</p></td>
                            <td> <p class=' text-center schedule-text'>Visit Seminyak</p></td>
                          </tr>
                          <tr>
                            <td> <p class=' text-center schedule-text content'>8.00</p></td>
                            <td> <p class=' text-center schedule-text content'>9.00</p></td>
                            <td> <p class=' text-center schedule-text'>Visit Seminyak</p></td>
                          </tr>
                                                    <tr>
                            <td> <p class=' text-center schedule-text content'>8.00</p></td>
                            <td> <p class=' text-center schedule-text content'>9.00</p></td>
                            <td> <p class=' text-center schedule-text'>Visit Seminyak</p></td>
                          </tr>
                        </tbody>
                      </table>
 
                </div>

            </div>
        </div>
    </div>
</div>

@endsection