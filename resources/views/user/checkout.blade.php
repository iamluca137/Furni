@extends('layouts.user')
@section('title', 'Checkout')
@section('content')
    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <form action="{{ route('checkoutPost') }}" method="post" id="c_checkout">
                        @csrf
                        <div class="p-3 p-lg-5 border bg-white">
                            <div class="form-group mb-3">
                                <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_country" name="c_country" value="Việt Nam"
                                    readonly>
                                @error('c_country')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                                    @error('c_fname')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name </label>
                                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="c_address">
                                    @error('c_address')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-md-6">
                                    <label for="c_city" class="text-black">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_city" name="c_city">
                                    @error('c_city')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">Posta/Zip </label>
                                    <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-md-6">
                                    <label for="c_email" class="text-black">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="c_email" name="c_email">
                                    @error('c_email')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="c_phone" name="c_phone">
                                    @error('c_phone')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-5 pt-4 border bg-white">
                                <div class="row">
                                    <form action="{{ route('checkCoupon') }}" method="post">
                                        @csrf
                                        <div class="col-md-12">
                                            <p></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 mb-3 mb-md-0">
                                                <input type="text" class="form-control py-3" name="coupon_code"
                                                    placeholder="Enter your coupon code if you have one...">
                                                <div class="mt-3">
                                                    @if (session('error'))
                                                        <span class="text-danger">{{ session('error') }}</span>
                                                    @endif
                                                    @if (session('discount'))
                                                        <span class="tag p-1 bg-gray">
                                                            {{ session('discount')['code'] }}
                                                            <a href="{{ route('removeCoupon') }}"
                                                                class="ms-3 btn-close mx-2"></a>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-black w-100">Apply</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Total</th>
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
                                                <td>{{ $product->name }} <strong class="mx-2">x</strong>
                                                    {{ $cartProduct['quantity'] }}</td>
                                                <td>${{ $cartProduct['quantity'] * $product->price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                            <td class="text-black">${{ $subTotal }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Discount</strong></td>
                                            <td class="text-black">
                                                ${{ session('discount')['discount'] ?? 0.0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td class="text-black font-weight-bold">
                                                <strong>${{ $subTotal - (session('discount')['discount'] ?? 0) }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="form-group text-center">

                                    <form action="{{ route('paypal') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="total"
                                            value="{{ $subTotal - (session('discount')['discount'] ?? 0) }}">
                                        <button class="btn btn-black rounded btn-sm fs-6 py-3 btn-block"
                                            id="btn-checkout">
                                            Pay With Paypal
                                        </button>
                                    </form>
                                </div>
                            </div>
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
        $('#btn-checkout').click(function() {
            $('#c_checkout').submit();
        });
    });
</script>
