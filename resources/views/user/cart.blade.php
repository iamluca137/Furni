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
    @if (count($cartProducts) === 0)

        <div class="text-center" style="margin-bottom: 10rem">
            <img src="{{ asset('assets/images/generals/empty_cart.png') }}" width="250px">
            <h2>
                Your cart is empty
            </h2>
            <p>
                Looks like you haven't added any items to the cart yet.
            </p>

            <a href="{{ route('shop') }}" class="btn btn-primary btn-lg py-3">
                Add Items To Cart
            </a>
        </div>
    @else
        <div class="container-xxl border-bottom"></div>
        <div class="untree_co-section pt-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12">
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
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('checkout') }}" class="btn btn-black btn-lg py-3 btn-block">
                            Proceed To Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
