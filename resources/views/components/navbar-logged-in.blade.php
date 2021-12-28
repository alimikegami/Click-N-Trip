<nav class="navbar navbar-expand-lg navbar-dark" id='custom-navbar'>
  <div class="container d-flex align-items-center">
    <a class="navbar-brand" href="/"><img id='navbar-logo'src="{{ asset('Gallery/logoterang.png') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        @if (Auth::user()->role == 'user')
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link active" href="/users/register/tour-guide">Be A Tour Guide</a>
          </li>
        @endif
        <li class="nav-item d-flex align-items-center">
          <a class="nav-link active" href="{{ route('list-day-trips') }}">List your Trip</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-person-circle pe-2" style="font-size: 2rem; color:white;"></i>
                <span class="text-white" id='username'>{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/users/history">Transaction History</a>
                @if (Auth::user()->role == "tour_guide")
                  <a class="dropdown-item" href="/users/my-listings">Listing</a>
                @endif
                <div class="dropdown-divider"></div>
                <a type="button" class="dropdown-item" id="logoutButton" onclick="showLogoutModal()">Log Out</a>
            </div>
        </li>
      </ul>
    </div>
  </div>
</nav>