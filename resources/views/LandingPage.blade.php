<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/LandingPage.css')}}">
    <link rel="stylesheet" href="{{asset('css/Navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/ad.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Click-n-Trip</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" id='custom-navbar'>
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Click-n-Trip</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="#">View Deals</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Sign-Up</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Landing Page Starts Here -->
      <!-- Header Section -->
        <div class="header container-fluid" id='landing-header'>
              <div id = "search-column" class="col offset-md-4 ">
                  <div class="input-group pt-5 pb-5">
                      <input type="text" class="form-control" placeholder="Search Your Destination..." aria-label="SearchLabel"/>
                      <div id='SearchButton'>
                          <div class="input-group-text" id='SearchIconBg'>
                              <span>
                                  <i class="bi bi-search" style="font-size: 1.5rem; color:white;"></i>
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Benefits Section -->
        <div class="benefits-section container">
            <div class="row">
                <h2 class="text-center mt-5 mb-5">Why Use Click n Trip?</h2>
                <div class="col pt-1 text-center benefits-item">
                    <h3 class="pb-1">Easy to Use</h3>
                    <i class="bi bi-check2-square" style="font-size: 7rem; color:black;"></i>
                    <p class="pt-2">Our service provides ease of use and easy access for our customer</p>
                </div>
                <div class="col pt-1 text-center benefits-item">
                    <h3 class="pb-1">Fast</h3>
                    <i class="bi bi-lightning-charge-fill" style="font-size: 7rem; color:black;"></i>
                    <p class="pt-2">Using Click-n-Trip you will get tour guide for your travels fast</p>
                </div>
                <div class="col pt-1 text-center benefits-item">
                    <h3 class="pb-1">Efficient</h3>
                    <i class="bi bi-graph-up" style="font-size: 7rem; color:black;"></i>
                    <p class="pt-2">Click-n-Trip keeps all form of transactions using our services as efficient as possible</p>
                </div>
            </div>
        </div>
    <!-- Ad Section -->
    <div class="ad-section container-fluid">
      <div class="ad container-fluid mb-3 mt-5" id="ad1">
          <h3 class='text-white'>Full Package Balinese Beach Tour</h3>
        <h4 class='text-white'>IDR.500.000,00</h4>
      </div>
      <div class="ad container-fluid mb-3" id="ad2">
        <h3 class='text-white'>Full Package Nusa Penida Tour</h3>
        <h4 class='text-white'>IDR.750.000,00</h4>
      </div>
    </div>

    <!-- Top Destination Section -->
    <div class="container-fluid">
      <h2 class='text-left mb-5 mt-5'>Top Destination Nowadays</h2>
      <div class="container">
        <div class="row">
          <div class="col mb-3">
            <div class="card" style="width: 18rem;">
              <img src="Gallery/Surabaya.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Surabaya</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-grid gap-2">
                  <button href="#" class="btn btn-primary">View</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card" style="width: 18rem;">
              <img src="Gallery/Uluwatu.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Bali</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-grid gap-2">
                  <button href="#" class="btn btn-primary">View</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card" style="width: 18rem;">
              <img src="Gallery/baligirls.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Nusa Penida</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-grid gap-2">
                  <button href="#" class="btn btn-primary">View</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Footer Section -->
    <div class="container-fluid mt-5" id="landing-footer">
      <h3>Contact Us!</h3>
      <ul class="pb-5">
        <li>Instagram</li>
        <li>Facebook</li>
        <li>Whats-App</li>
      </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>