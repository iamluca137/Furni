@extends('layouts.user')
@section('content')
    <div class="mt-5 pt-5">
        <div class="container">
            <div class="row main-product justify-content-between mb-5">
                <div class="col col-md-12 col-lg-6">
                    <div class="row">
                        <div class="col col-md-12 col-lg-3 more-image d-flex flex-column justify-content-between">
                            <div class="border rounded d-flex justify-content-center">
                                <img src="{{ asset('assets/images/user/product-3.png') }}" width="150px">
                            </div>
                            <div class="border rounded d-flex justify-content-center">
                                <img src="{{ asset('assets/images/user/product-3.png') }}" width="150px">
                            </div>
                            <div class="border rounded d-flex justify-content-center">
                                <img src="{{ asset('assets/images/user/product-3.png') }}" width="150px">
                            </div>
                        </div>
                        <div class="col col-md-12 col-lg-9 main-image border rounded">
                            <img src="{{ asset('assets/images/user/product-3.png') }}">
                        </div>
                    </div>
                </div>
                <div class="col col-md-12 col-lg-6 ps-4">
                    <div class="col">
                        <h2 class="name-product text-dark">SONDE MATTE NIGHTSTAND WITH DRAWER</h2>
                        <p class="price-product text-dark fs-4 pt-3">$ 120.00</p>
                        <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
                            velit
                            imperdiet dolor tempor tristique.</p>
                    </div>
                    <div class="col mb-5 mt-4">
                        <form action="#" method="post" class="d-flex align-items-center">
                            <div class="box-quantity me-4 border bg-light py-2">
                                <span class="px-3 fs-5 text-dark fw-bold btn-quantity-minus"
                                    style="cursor: pointer">-</span>
                                <input type="text" name="quantity" id="quantity" class="no-border w-1 bg-light fs-5"
                                    style="width: 12px" value="1">
                                <span class="px-3 fs-5 text-dark fw-bold btn-quantity-plus" style="cursor: pointer">+</span>
                            </div>
                            <button class="btn btn-submit" type="submit">ADD TO CART</button>
                        </form>
                    </div>
                    <div class="col">
                        {{-- <div class="row mb-1">
                            <div class="col-2 fw-bold">Code:</div>
                            <div class="col">FSDE343</div>
                        </div> --}}
                        <div class="row mb-1">
                            <div class="col-2 fw-bold">Category:</div>
                            <div class="col">
                                <a href="#" class="text-decoration-none category-product">Chair</a>
                            </div>
                        </div>
                        {{-- <div class="row mb-1">
                            <div class="col-2 fw-bold">Tags:</div>
                            <div class="col">
                                <a href="#"><span class="badge bg-secondary me-2">Modern</span></a>
                                <a href="#"><span class="badge bg-secondary me-2">Wood</span></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row detail-product pb-5">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link text-dark active" id="nav-description-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description"
                            aria-selected="true">Description</button>
                        <button class="nav-link text-dark" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info"
                            type="button" role="tab" aria-controls="nav-info" aria-selected="false">Info</button>
                        <button class="nav-link text-dark" id="nav-review-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                            aria-selected="false">Review
                            (0)</button>
                    </div>
                </nav>
                <div class="tab-content mb-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                        aria-labelledby="nav-description-tab">
                        <p class="mt-4">
                            Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut
                            metus
                            varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                            ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                            condimentum
                            rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit
                            vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec
                            vitae
                            sapien ut libero venenatis.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                        <div class="row mt-4">
                            <div class="col-2 fw-bold">Weight:</div>
                            <div class="col">0.5 kg</div>
                        </div>
                        <div class="row">
                            <div class="col-2 fw-bold">Dimensions:</div>
                            <div class="col">100 x 50 x 30 cm</div>
                        </div>
                        <div class="row">
                            <div class="col-2 fw-bold">Color:</div>
                            <div class="col">Black</div>
                        </div>
                        <div class="row">
                            <div class="col-2 fw-bold">SIZES:</div>
                            <div class="col">L- 450x550cm, M- 330x550cm, S- 220x330cm</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                        <div class="row box-review mt-4 ms-3 text-dark">
                            <h3 class="p-0">Review</h3>
                            <span class="border mb-4 border-dark" style="width: 90px"></span>
                            <div class="comment mb-4">
                                <div class="row ">
                                    <div class="col col-md-1 col-lg-1 ps-0">
                                        <img src="{{ asset('assets/images/accounts/account-1.png') }}"
                                            class="rounded-circle" width="50px">
                                    </div>
                                    <div class="col col-md-11 col-lg-11 ps-0">
                                        <form action="#" method="post">
                                            <div class="mb-3">
                                                <textarea class="form-control" name="" id="" rows="4"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-submit py-2">Post</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="list-review p-0">
                                <ul class="p-0">
                                    @for ($i = 0; $i < 3; $i++)
                                        <li class="list-item mt-4">
                                            <div class="row">
                                                <div class="col col-md-1 col-lg-1">
                                                    <img src="{{ asset('assets/images/accounts/account-1.png') }}"
                                                        class="rounded-circle" width="50px">
                                                </div>
                                                <div class="col col-md-11 col-lg-11 ps-0">
                                                    <div class="d-flex justify-content-start">
                                                        <p class="fw-bold mb-0">Alex CDHSJD</p>
                                                        <p class="px-2 mb-0">·</p>
                                                        <p class="mb-0">1h</p>
                                                    </div>
                                                    <div class="row">
                                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non
                                                            rerum
                                                            cum incidunt error. Itaque debitis animi doloribus molestiae, ad
                                                            dolores.Lorem ipsum dolor, sit amet consectetur adipisicing
                                                            elit.
                                                            Non rerum
                                                            cum incidunt error. Itaque debitis animi doloribus molestiae, ad
                                                            dolores.
                                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non
                                                            rerum
                                                            cum incidunt error. Itaque debitis animi doloribus molestiae, ad
                                                            dolores.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-product">
                <h3 class="mb-5 text-dark">Related Product</h3>
                <div class="container product-section p-0 mb-4">
                    <div class="row">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="col-12 col-md-4 col-lg-3 mb-5">
                                <div class="col card-pro">
                                    <div class="bg-light">
                                        <a href="{{ route('product-details') }}" class="text-decoration-none">
                                            <img src="{{ asset('assets/images/user/product-3.png') }}"
                                                class="card-img-top">
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <a href="{{ route('product-details') }}"
                                            class="text-decoration-none d-flex justify-content-between">
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
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
