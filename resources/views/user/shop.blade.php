@extends('layouts.user')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero mb-5">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <h1 class="m-0">Shop</h1>
                </div>
                <div class="col-lg-6">
                    <nav>
                        <ol class="breadcrumb m-0 justify-content-lg-end">
                            <li class="breadcrumb-item fw-bold">
                                <a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item fw-bold active" aria-current="page">Shop</li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    {{-- <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <!-- Start Column 1 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product-details') }}">
                        <img src="{{ asset('assets/images/user/product-3.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/user/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product-details') }}">
                        <img src="{{ asset('assets/images/user/product-1.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/user/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product-details') }}">
                        <img src="{{ asset('assets/images/user/product-2.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Kruzo Aero Chair</h3>
                        <strong class="product-price">$78.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/user/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product-details') }}">
                        <img src="{{ asset('assets/images/user/product-3.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Ergonomic Chair</h3>
                        <strong class="product-price">$43.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/user/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 4 -->


                <!-- Start Column 1 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product-details') }}">
                        <img src="{{ asset('assets/images/user/product-3.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/user/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product-details') }}">
                        <img src="{{ asset('assets/images/user/product-1.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/user/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product-details') }}">
                        <img src="{{ asset('assets/images/user/product-2.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Kruzo Aero Chair</h3>
                        <strong class="product-price">$78.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/user/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product-details') }}">
                        <img src="{{ asset('assets/images/user/product-3.png') }}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Ergonomic Chair</h3>
                        <strong class="product-price">$43.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/user/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 4 -->

            </div>
        </div>
    </div> --}}
    <div class="container my-5 py-5">
        <div class="row justify-content-between">
            <div class="col col-md-3 pe-5">
                <div class="row categories mb-3">
                    <h2 class="p-0 text-dark">Categories</h2>
                    <span class="border mb-4 border-dark" style="width: 90px"></span>
                    <ul class="p-0">
                        <li class="cat-list pb-1">
                            <a href="#" class="text-decoration-none cat-link">Decoration</a>
                            <span>(18)</span>
                        </li>
                        <li class="cat-list pb-1">
                            <a href="#" class="text-decoration-none cat-link">Decoration</a>
                            <span>(18)</span>
                        </li>
                        <li class="cat-list pb-1">
                            <a href="#" class="text-decoration-none cat-link">Decoration</a>
                            <span>(18)</span>
                        </li>
                        <li class="cat-list pb-1">
                            <a href="#" class="text-decoration-none cat-link">Decoration</a>
                            <span>(18)</span>
                        </li>
                        <li class="cat-list pb-1">
                            <a href="#" class="text-decoration-none cat-link">Decoration</a>
                            <span>(18)</span>
                        </li>
                        <li class="cat-list pb-1">
                            <a href="#" class="text-decoration-none cat-link">Decoration</a>
                            <span>(18)</span>
                        </li>
                    </ul>
                </div>
                <div class="row search-product mb-3">
                    <form action="#" method="post" class="p-0">
                        <div>
                            <input type="text" class="border-0 search-product fs-6 w-100" placeholder="Search">
                        </div>
                    </form>
                    <span class="border mb-4 border-dark mt-1"></span>
                </div>
                <div class="row categories mb-3">
                    <h2 class="p-0 text-dark">Tags</h2>
                    <span class="border mb-4 border-dark" style="width: 90px"></span>
                    <div class="p-0">
                        @for ($i = 0; $i < 5; $i++)
                            <a href="#" class="p-0 pe-2 tag-link">Accessories</a>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col col-md-9">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @for ($i = 0; $i < 7; $i++)
                        <div class="col card-pro">
                            <div class="bg-light">
                                <a href="{{route('product-details')}}" class="text-decoration-none">
                                    <img src="{{ asset('assets/images/products/product-1.png') }}" class="card-img-top">
                                </a>
                            </div>
                            <div class="mt-2">
                                <a href="{{route('product-details')}}" class="text-decoration-none d-flex justify-content-between">
                                    <p class="fw-bold m-0 fs-6">Green Plates</p>
                                    <p class="fw-bold m-0 fs-6">$60.00</p>
                                </a>
                            </div>
                            <div>
                                <a href="#" class="text-decoration-none">
                                    <p>Dinnerware</p>
                                </a>
                            </div>
                        </div>
                    @endfor
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
    </div>
@endsection
