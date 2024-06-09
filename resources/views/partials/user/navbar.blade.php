<nav class="custom-navbar navbar navbar-expand-md navbar-dark" arial-label="Furni navigation bar">
    <div class="container-xxl px-0">
        <div class="">
            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav">
                    <li class="ms-0"><a class="nav-link ps-0 pe-4" href="{{ route('home') }}">Home</a></li>
                    <li class="ms-0"><a class="nav-link ps-0 pe-4" href="{{ route('shop') }}">Shop</a></li>
                    <li class="ms-0"><a class="nav-link ps-0 pe-4" href="{{ route('about') }}">About</a></li>
                    <li class="ms-0"><a class="nav-link ps-0 pe-4" href="{{ route('blog') }}">Blog</a></li>
                </ul>
                <a class="navbar-brand" href="{{ route('home') }}"> Furni.</a>
                <ul class="custom-navbar-cta navbar-nav">
                    <li class=" d-flex justify-content-center align-items-center">
                        <div class="dropdown nav-link">
                            <a class="" role="button" id="dropdownAccount" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('assets/images/user/user.svg') }}">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownAccount">
                                @if (Auth::check())
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item disabled" href="#">Setting</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Login/Register</a></li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link nav-search">
                            <img src="{{ asset('assets/images/user/search.svg') }}">
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('cart') }}">
                            <img src="{{ asset('assets/images/user/cart.svg') }}">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
