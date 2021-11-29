<nav class="navbar navbar-expand-lg navbar-dark" id='custom-navbar'>
  <div class="container">
    <a class="navbar-brand" href="/"><img id='navbar-logo'src="../Gallery/logoterang.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Find a Tour</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('list-day-trips') }}">List your Trip</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">About</a>
        </li>
        <li class="nav-item">
          <a type="button" href='{{ route('login') }}' id="navbar-button" class='btn btn-secondary'>Log In</a>
        </li>
        <li class="nav-item">
          <a type="button" href='{{ route('register') }}'  id="navbar-button" class='btn btn-secondary'>Sign Up</a>
        </li>
      </ul>
    </div>
  </div>
</nav>