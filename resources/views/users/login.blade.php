@extends('layouts.main-layout')

@section('css')
  <link rel="stylesheet" href="../css/LoginPage.css">
@endsection

@section('body')
<div class="parent container d-flex justify-content-center align-items-center h-100" id='login-container'>
  <div class="form-container container-fluid rounded mt-5 mb-5">
    <div class="row">
      <div class="col-lg-2 rounded" id='container-image'>
      </div>
      <div class="col">
        <div class="container">
          <form class="child" action="/users/login" method="POST">
              @csrf
              <h2 class='pt-5' id='caption'>Log-In</h2>
              <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name='email' id="email" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="password">
              </div>
                  @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              <div class="d-grid gap-2 pb-3">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
              <div class='pb-5'>
                <p href="#" class='text-center text-black'>Forgot Password</p>
              </div>   
          </form>
        </div>
    </div>
    <div class="col d-flex justify-content-center align-items-center">
      <div class="container" id="login-right-content">
        <h2 class='text-center'id='right-text' >Dont have an account?</h2>
        <div class="d-grid gap-2 pb-5">
          <button type="submit" class="btn btn-primary">Sign-Up</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection