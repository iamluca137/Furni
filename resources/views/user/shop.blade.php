@extends('layouts.user')
@section('title', 'Products')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container-xxl">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 p-0 ">
                    <h1 class="m-0">Shop</h1>
                </div>
                <div class="col-lg-6 p-0 align-middle">
                    <div class="cover">
                        <button class="left btn-scroll" onclick="leftScroll()">
                            <i class="fas fa-angle-left"></i>
                        </button>
                        <div class="scroll-images">
                            @foreach ($categories as $category)
                                <div>
                                    <div class="child">
                                        <a class="text-decoration-none" href="{{ route('shopCategory', $category->slug) }}">
                                            <img src="{{ asset('assets/images/categories/' . $category->image) }}"
                                                class="card-img-top">
                                        </a>
                                    </div>
                                    <a class="text-decoration-none" href="{{ route('shopCategory', $category->slug) }}">
                                        <span style="margin: 1px 10px;">{{ $category->name }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="right btn-scroll" onclick="rightScroll()">
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl border-bottom"></div>
    <!-- End Hero Section -->
    <div class="container-xxl mt-5">
        <div class="row justify-content-between">
            <div class="col col-md-2 p-0">
                <div class="row categories mb-3 ms-2">
                    <h2 class="p-0 text-dark">Categories</h2>
                    <span class="border mb-4 border-dark" style="width: 90px"></span>
                    <ul class="p-0">
                        @foreach ($categories as $category)
                            <li class="cat-list pb-1">
                                <a href="#" class="text-decoration-none cat-link">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="row categories mb-3 ms-2">
                    <h2 class="p-0 text-dark">Prices</h2>
                    <span class="border mb-4 border-dark" style="width: 90px"></span>
                    <form action="#" class="p-0 ">
                        <div class="form-price">
                            <div class="d-flex me-5">
                                <input type="text" name="" placeholder="$ Min" class="w-50 ps-2" style="">
                                <span class="px-3"> - </span>
                                <input type="text" name="" placeholder="$ Max" class="w-50 ps-2" style="">
                            </div>
                            <div class="d-flex me-5">
                                <button class="btn btn-brand w-100 mt-3 py-1">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col col-md-10 mb-5">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($products as $product)
                        <div class="col card-pro">
                            <div class="image-product">
                                <a href="{{ route('productDetails', $product->slug) }}" class="text-decoration-none">
                                    <img src="{{ asset('assets/images/products/' . $product->images->first()->image) }}"
                                        class="card-img-top ">
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const scrollImages = document.querySelector(".scroll-images");
        const scrollLength = scrollImages.scrollWidth - scrollImages.clientWidth;
        const leftButton = document.querySelector(".left");
        const rightButton = document.querySelector(".right");

        function checkScroll() {
            const currentScroll = scrollImages.scrollLeft;
            if (currentScroll === 0) {
                // remove left button
                leftButton.style.display = "none";
                // add right button
                rightButton.style.display = "block";
            } else if (currentScroll === scrollLength) {
                // remove right button
                rightButton.style.display = "none";
                // add left button
                leftButton.style.display = "block";
            } else {
                leftButton.style.display = "block";
                rightButton.style.display = "block";
            }
        }

        scrollImages.addEventListener("scroll", checkScroll);
        window.addEventListener("resize", checkScroll);
        checkScroll();

        window.leftScroll = function() {
            scrollImages.scrollBy({
                left: -253,
                behavior: "smooth"
            });
        }

        window.rightScroll = function() {
            scrollImages.scrollBy({
                left: 253,
                behavior: "smooth"
            });
        }

        leftButton.addEventListener("click", leftScroll);
        rightButton.addEventListener("click", rightScroll);
    });
</script>
