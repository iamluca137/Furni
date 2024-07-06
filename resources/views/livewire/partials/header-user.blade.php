<div>
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark " arial-label="Furni navigation bar">
        <div class="container-xxl px-0">
            <div class="collapse-wrapper">
                <div class="collapse navbar-collapse d-flex justify-content-center align-items-center">
                    <a class="navbar-brand" href="{{ route('home') }}"> Furni.</a>
                </div>
                <div class="collapse navbar-collapse" id="navbarsFurni">
                    <ul class="custom-navbar-nav navbar-nav">
                        <li class="ms-0"><a class="nav-link ps-0 pe-4" href="{{ route('home') }}">Home</a></li>
                        <li class="ms-0"><a class="nav-link ps-0 pe-4" href="{{ route('shop') }}">Shop</a></li>
                        <li class="ms-0"><a class="nav-link ps-0 pe-4" href="{{ route('about') }}">About</a></li>
                        <li class="ms-0"><a class="nav-link ps-0 pe-4" href="{{ route('blog') }}">Blog</a></li>
                    </ul>
                    <ul class="custom-navbar-cta navbar-nav">
                        <li class=" d-flex justify-content-center align-items-center">
                            <div class="dropdown nav-link">
                                <a class="" role="button" id="dropdownAccount" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('assets/images/user/user.svg') }}">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownAccount">
                                    @if (Auth::check())
                                        <li><a class="dropdown-item" href="{{ route('setting') }}">Setting</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('purchase') }} ">Purchase Order</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </li>
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
                        @if (Auth::check())
                            <li>
                                <a class="nav-link" href="{{ route('cart') }}">
                                    <img src="{{ asset('assets/images/user/cart.svg') }}">
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="c-header-search ">
        <div class="c-header-search__wrap">
            <div class="c-header-search__shadow js-search-close">
            </div>
            <div class="c-header-search__form">
                <div class="c-header-search__tip fw-bold fs-2 text-dark pb-4 text-center">What are you looking for?
                </div>
                <div class="">
                    <form role="search" class="">
                        <div class="row search-product">
                            <div class="p-0 m-0 d-flex">
                                <input type="text" class="border-0 search-product fs-6 w-100 p-0 inputSearch"
                                    style="background: transparent" placeholder="Start typing...">
                                <i class="fa-regular fa-circle-xmark c-header-search__clear searchClear d-none"
                                    style="line-height: inherit;"></i>
                            </div>
                            <span class="input_underline"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="c-header-search__close boxSearchClose">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
    </div>
</div>
