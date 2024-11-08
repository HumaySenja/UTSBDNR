<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{ route('home') }}" class="navbar-brand"><h1 class="text-primary display-6">Sangkuriang Mart</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    {{-- <a href="{{ route('home') }}" class="nav-item nav-link {{ ($title == "Sangkuriang Mart") ? "active" : "" }}">Home</a>
                    <a href="{{ route('shop') }}" class="nav-item nav-link {{ ($title == "Sangkuriang Mart | Shop") ? "active" : "" }}">Shop</a>
                    <a href="{{ route('shop-detail') }}" class="nav-item nav-link {{ ($title == "Sangkuriang Mart | Shop Detail") ? "active" : "" }}">Shop Detail</a> --}}
                </div>
                <div class="d-flex m-3 me-0">
                    {{-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button> --}}
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4 my-auto me-2">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4 my-auto">Login</a>
                    @else
                    <a href="{{ route('history') }}" class="position-relative me-4 my-auto">
                        <i class="fa fa-history fa-2x"></i>
                        {{-- <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span> --}}
                    </a>
                    <a href="{{ route('transaction') }}" class="position-relative me-4 my-auto">
                        <i class="fa fa-receipt fa-2x"></i>
                        {{-- <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span> --}}
                    </a>
                    <a href="{{ route('cart') }}" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        @if(isset($cartCount) && $cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-secondary">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                        {{-- <a href="#" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a> --}}
                        <a href="{{ route('logout') }}" class="btn btn-outline-primary rounded-pill px-4 my-auto ms-2">Logout</a>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal Search End -->
