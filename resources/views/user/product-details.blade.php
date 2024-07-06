@extends('layouts.user')
@section('title', $product->name)
@section('content')
    <div class="mt-5">
        <div class="container">
            <div class="row main-product justify-content-between mb-5">
                <div class="col col-md-12 col-lg-8">
                    <div class="ecommerce-gallery">
                        <div class="row shadow-5">
                            @foreach ($product->images as $image)
                                <div class="col-6 mb-1 ps-0 pb-2">
                                    <div class="lightbox card-img h-100">
                                        <img src="{{ asset('assets/images/products/' . $image->image) }}" class="w-100" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col col-md-12 col-lg-4 ps-4">
                    <div class="col">
                        <h2 class="name-product text-dark">{{ strtoupper($product->name) }}</h2>
                        <p class="price-product text-dark fs-4 pt-3">$ {{ $product->price }}</p>
                        <p>{{ $product->short_description }}</p>
                    </div>
                    <div class="col mb-5 mt-4">
                        <form action="{{ route('addItemToCart') }}" method="post" class="d-flex align-items-center">
                            @csrf
                            <div class="box-quantity me-4 border bg-light py-2">
                                <span class="px-3 fs-5 text-dark fw-bold btn-quantity-minus"
                                    style="cursor: pointer">-</span>
                                <input type="text" name="quantity" id="quantity" class="no-border w-1 bg-light fs-5"
                                    style="width: 40px; text-align: center" readonly>
                                <span class="px-3 fs-5 text-dark fw-bold btn-quantity-plus" style="cursor: pointer">+</span>
                            </div>
                            <input type="hidden" name="product_slug" value="{{ $product->slug }}" readonly>
                            <input type="hidden" id="max-quantity" value="{{ $product->quantity }}">
                            <button class="btn btn-submit" type="submit">ADD TO CART</button>
                        </form>
                        <div>
                            @if (session('error'))
                                <div class="mt-1 text-danger">{{ session('error') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2 fw-bold">Quantity:</div>
                            <div class="col">
                                <p class="m-0">
                                    {{ $product->quantity }} in stock
                                </p>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-2 fw-bold">Category:</div>
                            <div class="col">
                                <a href="{{ route('shopSubCategory', ['category' => $product->subCategory->category->slug, 'subCategory' => $product->subCategory->slug]) }}"
                                    class="category-product px-1">{{ $product->subCategory->name }}</a>,
                                <a href="{{ route('shopCategory', $product->subCategory->category->slug) }}"
                                    class="category-product px-1">{{ $product->subCategory->category->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row detail-product pb-5">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link text-dark active" id="nav-description-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description"
                            aria-selected="true">Description</button>
                        <button class="nav-link text-dark" id="nav-related-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-related" type="button" role="tab" aria-controls="nav-related"
                            aria-selected="false">Related Product
                            (0)</button>
                    </div>
                </nav>
                <div class="tab-content mb-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                        aria-labelledby="nav-description-tab">
                        <p class="mt-4">
                            {{ $product->description }}
                        </p>
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
                    <div class="tab-pane fade" id="nav-related" role="tabpanel" aria-labelledby="nav-related-tab">
                        <div class="row box-related mt-4 ms-3 text-dark"> 
                            @if (!empty($relatedProducts))
                                <div class="related-product p-0">
                                    <div class="container p-0 mb-4">
                                        <div class="d-flex justify-content-between">
                                            @foreach ($relatedProducts as $product)
                                                <div class="col-12 col-md-4 col-lg-3 mb-5">
                                                    <div class="col card-pro">
                                                        <div class="image-related-product">
                                                            <a href="{{ route('productDetails', $product->slug) }}"
                                                                class="text-decoration-none">
                                                                <img src="{{ asset('assets/images/products/' . $product->images->first()->image) }}"
                                                                    class="card-img-top">
                                                            </a>
                                                        </div>
                                                        <div class="mt-2">
                                                            <a href="{{ route('productDetails', $product->slug) }}"
                                                                class="text-decoration-none d-flex justify-content-between">
                                                                <p class="fw-bold m-0 fs-6">{{ $product->name }}</p>
                                                                <p class="fw-bold m-0 fs-6">${{ $product->price }}</p>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-decoration-none">
                                                                <p>{{ $product->subCategory->name }}</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // quantity default is 1
        $('#quantity').val(1);
        $('.btn-quantity-plus').click(function() {
            var quantityInput = $('#quantity');
            var currentValue = parseInt(quantityInput.val());
            if (!isNaN(currentValue)) {
                quantityInput.val(currentValue + 1);
            }
        });

        $('.btn-quantity-minus').click(function() {
            var quantityInput = $('#quantity');
            var currentValue = parseInt(quantityInput.val());
            if (!isNaN(currentValue) && currentValue > 1) {
                quantityInput.val(currentValue - 1);
            }
        });
        // when click plus or minus button, check if the quantity is greater than the max quantity. 
        // If quantity is greater than the max quantity, set the quantity to the max quantity and consloe log the message.
        $('.btn-quantity-plus, .btn-quantity-minus').click(function() {
            var quantityInput = $('#quantity');
            var maxQuantity = $('#max-quantity').val();
            var currentValue = parseInt(quantityInput.val());
            if (currentValue > maxQuantity) {
                quantityInput.val(maxQuantity);
            }
        });
    });
</script>
