@extends('layouts.user')
@section('title', 'Setting')
<style>
    .dropdown-list-image {
        height: 5rem;
        width: 5rem;
    }

    .dropdown-list-image img {
        height: 5rem;
        width: 5rem;
    }

    .btn-light {
        color: #2cdd9b;
        background-color: #e5f7f0;
        border-color: #d8f7eb;
    }
</style>
@section('content')
    <div class="container mb-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 p-0 mt-5 mb-2">
                <h1 class="m-0">Your Purchase</h1>
            </div>
        </div>
        <div class="row my-5 pb-5 justify-content-between">
            <div class="col-md-3 p-0 border-end ">
                <div class="d-flex flex-column flex-shrink-0" style="width: 180px;">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <button class="nav-link px-1 active" id="nav-all-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                aria-selected="true">
                                All
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-pending-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending"
                                aria-selected="false">
                                Pending
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-shipping-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-shipping" type="button" role="tab" aria-controls="nav-shipping"
                                aria-selected="false">
                                Shipping
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-completed-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed"
                                aria-selected="false">
                                Completed
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-cancelled-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-cancelled" type="button" role="tab" aria-controls="nav-cancelled"
                                aria-selected="false">
                                Cancelled
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-return-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-return" type="button" role="tab" aria-controls="nav-return"
                                aria-selected="false" disabled>
                                Returns/Refunds
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 p-0">
                <div class="tab-content mb-3 ms-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        @foreach ($orders as $order)
                                            <div class="item mb-3 p-3 bg-white border-bottom">
                                                @foreach ($order->products as $product)
                                                    @php
                                                        $productDetail = \App\Models\Product::where(
                                                            'id',
                                                            $product['product_id'],
                                                        )->first();
                                                    @endphp
                                                    <div class="d-flex align-items-center my-1">
                                                        <div
                                                            class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                            <img src="{{ asset('assets/images/products/' . $productDetail->images->first()->image) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="font-weight-bold col-md-9">
                                                            <div class="text-truncate">
                                                                {{ strtoupper($productDetail->name) }}</div>
                                                            <div class="row small">
                                                                <div class="col-1">Category:</div>
                                                                <div class="col">
                                                                    <a href="{{ route('shopSubCategory', ['category' => $productDetail->subCategory->category->slug, 'subCategory' => $productDetail->subCategory->slug]) }}"
                                                                        class="category-product px-1">{{ $productDetail->subCategory->name }}</a>,
                                                                    <a href="{{ route('shopCategory', $productDetail->subCategory->category->slug) }}"
                                                                        class="category-product px-1">{{ $productDetail->subCategory->category->name }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="small">x{{ $product['quantity'] }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div
                                                    class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                    <p class="status-order text-success d-flex align-items-center m-0">
                                                        {{ $order->status->name }}</p>
                                                    </p>
                                                    <div class="action-box">
                                                        @if ($order->status->id == 1)
                                                            <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                                Cancel
                                                            </button>
                                                        @endif
                                                        @if ($order->status->id == 3) 
                                                            <button type="button" class="btn btn-info mx-2 btn-sm rounded">
                                                                Invoice
                                                            </button>
                                                        @endif
                                                        @if ($order->status->id == 4)
                                                            <button type="button"
                                                                class="btn btn-primary mx-2 btn-sm rounded">
                                                                Buy Again
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        @foreach ($orders as $order)
                                            @if ($order->status->id == 1)
                                                <div class="item mb-3 p-3 bg-white border-bottom">
                                                    @foreach ($order->products as $product)
                                                        @php
                                                            $productDetail = \App\Models\Product::where(
                                                                'id',
                                                                $product['product_id'],
                                                            )->first();
                                                        @endphp
                                                        <div class="d-flex align-items-center my-1">
                                                            <div
                                                                class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                                <img src="{{ asset('assets/images/products/' . $productDetail->images->first()->image) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="font-weight-bold col-md-9">
                                                                <div class="text-truncate">
                                                                    {{ strtoupper($productDetail->name) }}</div>
                                                                <div class="row small">
                                                                    <div class="col-1">Category:</div>
                                                                    <div class="col">
                                                                        <a href="{{ route('shopSubCategory', ['category' => $productDetail->subCategory->category->slug, 'subCategory' => $productDetail->subCategory->slug]) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->name }}</a>,
                                                                        <a href="{{ route('shopCategory', $productDetail->subCategory->category->slug) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->category->name }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="small">x{{ $product['quantity'] }}</div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div
                                                        class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                        <p class="status-order text-success d-flex align-items-center m-0">
                                                            {{ $order->status->name }}</p>
                                                        </p>
                                                        <div class="action-box">
                                                            @if ($order->status->id == 1)
                                                                <button type="button"
                                                                    class="btn btn-gray mx-2 btn-sm rounded">
                                                                    Cancel
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-shipping" role="tabpanel" aria-labelledby="nav-shipping-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        @foreach ($orders as $order)
                                            @if ($order->status->id == 2)
                                                <div class="item mb-3 p-3 bg-white border-bottom">
                                                    @foreach ($order->products as $product)
                                                        @php
                                                            $productDetail = \App\Models\Product::where(
                                                                'id',
                                                                $product['product_id'],
                                                            )->first();
                                                        @endphp
                                                        <div class="d-flex align-items-center my-1">
                                                            <div
                                                                class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                                <img src="{{ asset('assets/images/products/' . $productDetail->images->first()->image) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="font-weight-bold col-md-9">
                                                                <div class="text-truncate">
                                                                    {{ strtoupper($productDetail->name) }}</div>
                                                                <div class="row small">
                                                                    <div class="col-1">Category:</div>
                                                                    <div class="col">
                                                                        <a href="{{ route('shopSubCategory', ['category' => $productDetail->subCategory->category->slug, 'subCategory' => $productDetail->subCategory->slug]) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->name }}</a>,
                                                                        <a href="{{ route('shopCategory', $productDetail->subCategory->category->slug) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->category->name }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="small">x{{ $product['quantity'] }}</div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div
                                                        class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                        <p class="status-order text-success d-flex align-items-center m-0">
                                                            {{ $order->status->name }}</p>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        @foreach ($orders as $order)
                                            @if ($order->status->id == 3)
                                                <div class="item mb-3 p-3 bg-white border-bottom">
                                                    @foreach ($order->products as $product)
                                                        @php
                                                            $productDetail = \App\Models\Product::where(
                                                                'id',
                                                                $product['product_id'],
                                                            )->first();
                                                        @endphp
                                                        <div class="d-flex align-items-center my-1">
                                                            <div
                                                                class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                                <img src="{{ asset('assets/images/products/' . $productDetail->images->first()->image) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="font-weight-bold col-md-9">
                                                                <div class="text-truncate">
                                                                    {{ strtoupper($productDetail->name) }}</div>
                                                                <div class="row small">
                                                                    <div class="col-1">Category:</div>
                                                                    <div class="col">
                                                                        <a href="{{ route('shopSubCategory', ['category' => $productDetail->subCategory->category->slug, 'subCategory' => $productDetail->subCategory->slug]) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->name }}</a>,
                                                                        <a href="{{ route('shopCategory', $productDetail->subCategory->category->slug) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->category->name }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="small">x{{ $product['quantity'] }}</div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div
                                                        class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                        <p class="status-order text-success d-flex align-items-center m-0">
                                                            {{ $order->status->name }}</p>
                                                        </p>
                                                        <div class="action-box">
                                                            @if ($order->status->id == 3) 
                                                                <button type="button"
                                                                    class="btn btn-info mx-2 btn-sm rounded">
                                                                    Invoice
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        @foreach ($orders as $order)
                                            @if ($order->status->id == 4)
                                                <div class="item mb-3 p-3 bg-white border-bottom">
                                                    @foreach ($order->products as $product)
                                                        @php
                                                            $productDetail = \App\Models\Product::where(
                                                                'id',
                                                                $product['product_id'],
                                                            )->first();
                                                        @endphp
                                                        <div class="d-flex align-items-center my-1">
                                                            <div
                                                                class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                                <img src="{{ asset('assets/images/products/' . $productDetail->images->first()->image) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="font-weight-bold col-md-9">
                                                                <div class="text-truncate">
                                                                    {{ strtoupper($productDetail->name) }}</div>
                                                                <div class="row small">
                                                                    <div class="col-1">Category:</div>
                                                                    <div class="col">
                                                                        <a href="{{ route('shopSubCategory', ['category' => $productDetail->subCategory->category->slug, 'subCategory' => $productDetail->subCategory->slug]) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->name }}</a>,
                                                                        <a href="{{ route('shopCategory', $productDetail->subCategory->category->slug) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->category->name }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="small">x{{ $product['quantity'] }}</div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div
                                                        class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                        <p class="status-order text-success d-flex align-items-center m-0">
                                                            {{ $order->status->name }}</p>
                                                        </p>
                                                        <div class="action-box">
                                                            @if ($order->status->id == 4)
                                                                <button type="button"
                                                                    class="btn btn-primary mx-2 btn-sm rounded">
                                                                    Buy Again
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="nav-return" role="tabpanel" aria-labelledby="nav-return-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        @foreach ($orders as $order)
                                            @if ($order->status->id == 5)
                                                <div class="item mb-3 p-3 bg-white border-bottom">
                                                    @foreach ($order->products as $product)
                                                        @php
                                                            $productDetail = \App\Models\Product::where(
                                                                'id',
                                                                $product['product_id'],
                                                            )->first();
                                                        @endphp
                                                        <div class="d-flex align-items-center my-1">
                                                            <div
                                                                class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                                <img src="{{ asset('assets/images/products/' . $productDetail->images->first()->image) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="font-weight-bold col-md-9">
                                                                <div class="text-truncate">
                                                                    {{ strtoupper($productDetail->name) }}</div>
                                                                <div class="row small">
                                                                    <div class="col-1">Category:</div>
                                                                    <div class="col">
                                                                        <a href="{{ route('shopSubCategory', ['category' => $productDetail->subCategory->category->slug, 'subCategory' => $productDetail->subCategory->slug]) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->name }}</a>,
                                                                        <a href="{{ route('shopCategory', $productDetail->subCategory->category->slug) }}"
                                                                            class="category-product px-1">{{ $productDetail->subCategory->category->name }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="small">x{{ $product['quantity'] }}</div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div
                                                        class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                        <p class="status-order text-success d-flex align-items-center m-0">
                                                            {{ $order->status->name }}</p>
                                                        </p>
                                                        <div class="action-box">
                                                            @if ($order->status->id == 3) 
                                                            @endif
                                                            @if ($order->status->id == 1)
                                                                <button type="button"
                                                                    class="btn btn-gray mx-2 btn-sm rounded">
                                                                    Request Return/Refund
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
