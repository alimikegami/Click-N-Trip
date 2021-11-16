@extends('layouts.main-layout')

@section('css')
  <link rel="stylesheet" href="../css/LoginPage.css">
@endsection
<!-- Register Page Starts Here -->

@section('body')
@include('components.navbar')
<div class="parent container d-flex justify-content-center align-items-center h-100" id='login-container'>
  <div class='form-container container-fluid mt-5 mb-5'>
    <div class="row" id='form-header'>
      <div class="container d-flex justify-content-center">
        <img id='logo' src="../Gallery/logobiru.png" alt="">
      </div>
    </div>
    <div class="row d-flex align-items-center justify-content-center">
        <form action="/users/register" method="post" id='form-login'>
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password">
              </div>
              <div class="mb-3">
                  <label for="password-confirm" class="form-label">Confirm Password</label>
                  <input type="password" name='password-confirm' class="form-control" id="password-confirm">
              </div>
              <div class="d-grid gap-2 pb-3">
                <button type="submit" class="btn btn-primary mt-3">Sign Up</button>
              </div>
              <hr>
        </form>
    </div>
    <div class="row">
      <div class="container pt-2 pb-5" id='form-login'>
        <p id='caption' class = 'text-center'>Already have an account?</p>
        <div class="d-grid gap-2 pb-2" >
          <button id='bottom-button' type="submit" class="btn btn-secondary text-black">Log in</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection