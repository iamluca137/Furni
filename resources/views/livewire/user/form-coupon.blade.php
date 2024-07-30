<div>
    <div class="row">
        <form wire:submit.prevent="checkCoupon">
            <div class="col-md-12">
                <p></p>
            </div>
            <div class="row">
                <div class="col-md-8 mb-3 mb-md-0">
                    <input type="text" class="form-control py-3" name="coupon_code" wire:model="coupon_code"
                        placeholder="Enter your coupon code if you have one...">
                    @error('coupon_code')
                        <div class="mt-1 text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-black w-100">Apply</button>
                </div>
            </div>
        </form>
        <div class="mt-3 mb-2">
            @if (session('error'))
                <span class="text-danger">{{ session('error') }}</span>
            @endif
            @if ($discount && $discount != null)
                <span class="tag p-1 bg-gray">
                    {{ $discount['code'] }}
                    <a href="#" class="ms-3 btn-close mx-2" wire:click="removeCoupon"></a>
                </span>
            @endif
        </div>
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
                <td class="text-black i_discount">
                    ${{ $discount['discount'] ?? 0.0 }}
                </td>
            </tr>
            <tr>
                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                <td class="text-black font-weight-bold">
                    <strong>${{ $subTotal - ($discount['discount'] ?? 0) }}</strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
