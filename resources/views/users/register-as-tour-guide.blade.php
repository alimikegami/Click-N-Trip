@extends('layouts.main-layout')

@section('css')
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="{{asset('css/LoginPage.css')}}">
@endsection

@section('body')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif
<!-- Register Page Starts Here -->
<div class="parent container d-flex justify-content-center align-items-center h-100" id='login-container'>
  <div class="form-container container-fluid mt-5 mb-5">
    <div class="row mb-4" id='form-header'>
      <div class="container d-flex justify-content-center">
        <img id='logo' src={{asset('Gallery/logobiru.png')}} alt="">
      </div>
      <p class='text-center' id='header-caption'>Fill in to register as tour guide!</p>
    </div>
    <div class="row d-flex align-items-center justify-content-center">
      <form id='form-login' class="child" action="/store-tour-guide" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <div class="row">
              <label for="province" class="form-label">Province</label>
            </div>
            <div class="row">
              <div class="container">
                <select class="custom-select rounded" name="province" id="province">
                  <option value='aceh' selected>Aceh</option>
                  <option value="bali">Bali</option>
                  <option value="bangka belitung">Bangka Belitung</option>
                  <option value="banten">Banten</option>
                  <option value="bengkulu">Bengkulu</option>
                  <option value="jawa tengah">Jawa Tengah</option>
                  <option value="kalimantan tengah">Kalimantan Tengah</option>
                  <option value="sulawesi tengah">Sulawesi Tengah</option>
                  <option value="jawa timur">Jawa timur</option>
                  <option value="kalimantan timur">Kalimantan Timur</option>
                  <option value="nusa tenggara timur">Nusa Tenggara Timur</option>
                  <option value="gorontalo">Gorontalo</option>
                  <option value="daerah khusus ibukota jakarta">Daerah Khusus Ibukota Jakarta</option>
                  <option value="jambi">Jambi</option>
                  <option value="lampung">Lampung</option>
                  <option value="maluku">Maluku</option>
                  <option value="sulawesi utara">Sulawesi Utara</option>
                  <option value="sumatera utara">Sumatera Utara</option>
                  <option value="papua">Papua</option>
                  <option value="riau">Riau</option>
                  <option value="kepulauan riau">Kepulauan Riau</option>
                  <option value="sulawesi tenggara">Sulawesi Tenggara</option>
                  <option value="kalimantan selatan">Kalimantan Selatan</option>
                  <option value="sulawesi selatan">Sulawesi Selatan</option>
                  <option value="sumatera selatan">Sumatera Selatan</option>
                  <option value="jawa barat">Jawa Barat</option>
                  <option value="kalimantan barat">Kalimantan Barat</option>
                  <option value="nusa tenggara barat">Nusa tenggara Barat</option>
                  <option value="papua barat">Papua Barat</option>
                  <option value="sulawesi barat">Sulawesi Barat</option>
                  <option value="sumatera barat">Sumatera Barat</option>
                  <option value="daerah istimewa yogyakarta">Daerah Istimewa Yogyakarta</option>
                  <option value="kalimantan utara">Kalimantan Utara</option>
                  <option value="maluku utara">Maluku Utara</option>
                </select>
              </div>
            </div>
          </div>
          <div class="mb-3">
              <label for="nik" class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" id="nik">
          </div>
          <div class="mb-3">
              <label for="fotoktp" class="form-label">Selfie With KTP</label>
              <input type="file" name="fotoktp" class="form-control" id="fotoktp">
          </div>
          <div class="d-grid gap-2 pb-5 pt-4">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
    </form>
  </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection