@extends('layouts.main-layout')

@section('css')
  <link rel="stylesheet" href="../css/LoginPage.css">
@endsection
<!-- Register Page Starts Here -->

@section('body')
<div class="parent container d-flex justify-content-center align-items-center h-100">
  <div class='form-container container-fluid rounded mt-5 mb-5'>
    <div class="row">
      <div class="col-lg-2 rounded" id='container-image'>
        
      </div>
      <div class="col">
        <div class="container">
          <form action="/users/register" method="post" class='register-form'>
              @csrf
              <h2 class='pt-5' id='caption'>Sign-Up</h2>
              <div class="mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
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
              <div class="d-grid gap-2 pb-5">
                <button type="submit" class="btn btn-primary mt-3">Sign Up</button>
              </div>
        </form>
      </div>
    </div>
    <div class="col d-flex justify-content-center align-items-center">
      <div class="container" id="right-content">
        <h2 class='text-center'id='right-text' >Already have an account?</h2>
        <div class="d-grid gap-2 pb-5">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection