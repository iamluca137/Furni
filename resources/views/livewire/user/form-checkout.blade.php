<div>
    <h2 class="h3 mb-3 text-black">Billing Details</h2>
    <form wire:submit.prevent="paypal">
        @csrf
        <div class="p-3 p-lg-5 border bg-white">
            <div class="form-group mb-3">
                <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_country" wire:model='c_country' name="c_country" readonly>
                @error('c_country')
                    <div class="mt-1 text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3 row">
                <div class="col-md-6">
                    <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" wire:model='c_fname' name="c_fname">
                    @error('c_fname')
                        <div class="mt-1 text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name </label>
                    <input type="text" class="form-control" id="c_lname" wire:model='c_lname' name="c_lname">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-md-12">
                    <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_address" wire:model='c_address' name="c_address">
                    @error('c_address')
                        <div class="mt-1 text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-md-6">
                    <label for="c_city" class="text-black">City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_city" wire:model='c_city' name="c_city">
                    @error('c_city')
                        <div class="mt-1 text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="c_postal_zip" class="text-black">Posta/Zip </label>
                    <input type="text" class="form-control" id="c_postal_zip" wire:model='c_postal_zip'
                        name="c_postal_zip">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-md-6">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_email" wire:model='c_email' name="c_email">
                    @error('c_email')
                        <div class="mt-1 text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_phone" wire:model='c_phone' name="c_phone">
                    @error('c_phone')
                        <div class="mt-1 text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
            <div class="form-group mb-5">
                <label for="c_order_notes" class="text-black">Order Notes</label>
                <textarea wire:model='c_order_notes' name="c_order_notes" id="c_order_notes" cols="30" rows="5"
                    class="form-control"></textarea>
            </div>
            <div wire:loading.block class="text-center py-2">
                Processing Payment...
            </div>
            <div class="form-group text-center d-flex justify-content-center">
                @if (session('discount'))
                    <input type="text" wire:model='coupon' name="coupon" value="{{ session('discount')['code'] }}">
                @endif
                <button type="submit"
                    class="btn btn-secondary px-5 rounded btn-sm fs-6 py-3 btn-block text-center d-flex align-items-center">
                    <span class="pe-1">Pay With</span>
                    <img src="{{ asset('assets/images/generals/PayPal.png') }}" width="100px">
                </button>
            </div>
        </div>
    </form>
</div>
