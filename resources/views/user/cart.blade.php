@extends('layouts.user')
@section('title', 'Cart')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container-xxl">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 p-0 ">
                    <h1 class="m-0">Cart</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl border-bottom"></div>

    <div class="untree_co-section pt-5" style="font-size: 16px !important">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Product</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subTotal = 0;
                                @endphp
                                @foreach ($cartProducts as $key => $cartProduct)
                                    @php
                                        $product_id = $cartProduct['product_id'];
                                        $product = App\Models\Product::find($product_id);
                                        $subTotal += $cartProduct['quantity'] * $product->price;
                                    @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('assets/images/products/' . $product->images->first()->image) }}"
                                                alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <p class="text-black m-0 p-0">{{ $product->name }}</p>
                                        </td>
                                        <td>
                                            <p class="text-black m-0 p-0">${{ $product->price }}</p>

                                        </td>
                                        <td>
                                            <p class="text-black m-0 p-0">{{ $cartProduct['quantity'] }}</p>
                                        </td>
                                        <td>
                                            <p class="text-black m-0 p-0">
                                                ${{ $cartProduct['quantity'] * $product->price }}
                                            </p>
                                        </td>
                                        <td>
                                            <a href="{{ route('removeCartItem', $product->id) }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 ps-5">
                    <div class="col-md-12">
                        <div class="row">
                            <form action="{{ route('checkCoupon') }}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label class="text-black h4" for="coupon">Coupon</label>
                                    <p>Enter your coupon code if you have one.</p>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-8 mb-3 mb-md-0">
                                        <input type="text" class="form-control py-3" name="coupon_code"
                                            placeholder="Coupon Code">
                                        <div class="mt-3">
                                            @if (session('error'))
                                                <span class="text-danger">{{ session('error') }}</span>
                                            @endif
                                            @if (session('success'))
                                                <span class="text-success">{{ session('success') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-black">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <span class="text-black">Subtotal</span>
                                    </div>
                                    <div class="col-md-8 text-end" style="padding-right: 200px">
                                        <strong class="text-black">${{ $subTotal }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <span class="text-black">Discount</span>
                                    </div>
                                    <div class="col-md-8 text-end" style="padding-right: 200px">
                                        @if (session('discount'))
                                            <strong class="text-success">- ${{ session('discount') }}</strong>
                                        @else
                                            <strong class="text-black">$0.00</strong>
                                        @endif

                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-8 text-end" style="padding-right: 200px">
                                        <strong class="text-black">${{ $subTotal - session('discount') }}</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-black btn-lg py-3 btn-block" type="submit">
                                            Proceed To Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
