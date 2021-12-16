@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/search-result.css">
@endsection
@section('body')
    <div class="container-fluid">
        <div class="container" id='section-container'>
            <form id="search-column" class="col">
                <div class="input-group pb-5">
                    <input type="text" class="form-control" placeholder="Search Your Destination..."
                        aria-label="SearchLabel" />
                    <div id='SearchButton'>
                        <button id='search-icon' class='btn btn-primary' type='submit'>
                            <i class="bi bi-search" style="font-size: 1.5rem;"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container mb-3" id='section-container'>
            <p>Showing Results for "{{ $keyword }}"</p>
        </div>
        <div class="container" id='section-container'>
            @foreach ($search_result as $item)
                <a href="/day-trips/{{ $item->id }}">
                    <div class="container-fluid border rounded mb-3 hover-shadow">
                        <div class="container">
                            <div class="row mt-2 mb-2">
                                <div 
                            style="
                                width: 20rem;
                                height: 12rem;
                                background-image: url({{ asset('storage/day-trip/' . $item->image_path) }});
                                background-size:cover;
                                background-position:center;
                            " 
                            class="col-lg-3 col-md-3 rounded">
                            </div>
                            <div class="col-lg">
                                <p>
                                    {{ $item->title }}
                                    <br> <span style='font-size: 14px;'>{{ $item->destination }}</span>
                                    <br> <span style='font-size: 14px;'>{{ $item->name }}</span>
                                </p>
                                <div class="pt-3" id='stars'>
                                    @if ($item->star_count)
                                    @for ($i = 0; $i < $item->star_count; $i++)
                                    <i class="bi bi-star-fill" style="font-size: 1rem; color:gold;"></i>
                                    
                                    @endfor
                                    
                                    @endif
                                    <span id='star-text'>{{ $item->star_count ? $item->star_count : 0 }} out of 5</span>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-lg-end">
                                <p>IDR{{ $item->price_per_day }}/Person</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </a>
            @endforeach
            {{-- <div class="container d-flex justify-content-center mt-4 mb-4">
                {{ $search_result->links() }}
            </div> --}}
        </div>
    </div>
    </div>
@endsection
