<div class="col-lg-4 d-flex justify-content-center">
    <div id="profile-info-holder" class="container border">
        <div id="icon-holder" class="container d-flex align-items-center justify-content-center mt-4">
            <i class="bi bi-person-circle" style="font-size: 5rem; color:#14279B;"></i>
        </div>
        <div id="text-holder" class="container mt-4 mb-5">
            <p class="fw-bold text-center">My Account</p>
            <p class="fw-bold">Name</p>
            <p>{{ Auth::user()->name }}</p>
            <p class="fw-bold">Email</p>
            <p>{{ Auth::user()->email }}</p>
            <p class="fw-bold">Total Listings</p>
            <p>{{ $listingCount[0]->count }}</p>
        </div>
    </div>
</div>