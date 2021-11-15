@extends('layouts.main-layout')

@section('css')
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/LoginPage.css">
  
@endsection

@section('body')
<div class="parent container d-flex justify-content-center align-items-center h-100" id='login-container'>
  <div class="form-container container-fluid mt-5 mb-5">
    <div class="row" id='form-header'>
      <div class="container d-flex justify-content-center">
        <img id='logo' src="../Gallery/logobiru.png" alt="">
      </div>
    </div>
      <div class="row d-flex align-items-center justify-content-center">
          <form class="child" action="/users/login" method="POST" id = 'form-login'>
              @csrf
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name='email' id="email" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="password">
              </div>
                  @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              <div class="d-grid gap-2 pb-3 pt-4">
                <button type="submit" class="btn btn-primary">Log In</button>
              </div>
              <div class='d-flex justify-content-center'>
                <a href="#" id="forgot-password" class='text-center'>Forgot your Password</a>
              </div>   
              <hr>
          </form>
      </div>
      <div class="row">
        <div class="container pt-5 pb-5" id = 'form-login'>
          <p id='caption' class='text-center' >Dont have an account yet?</p>
          <div class="d-grid gap-2 pb-3">
            <button class="btn btn-secondary">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection