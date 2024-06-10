@extends('layouts.user')
@section('title', 'Checkout')
@section('content')
    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border bg-white">
                        <div class="form-group mb-3">
                            <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                            <select id="c_country" class="form-control">
                                <option value="1">Select a country</option>
                                <option value="2">bangladesh</option>
                                <option value="3">Algeria</option>
                                <option value="4">Afghanistan</option>
                                <option value="5">Ghana</option>
                                <option value="6">Albania</option>
                                <option value="7">Bahrain</option>
                                <option value="8">Colombia</option>
                                <option value="9">Dominican Republic</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">First Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="c_fname">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Last Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="c_lname">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_address" name="c_address"
                                    placeholder="Street address">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-md-6">
                                <label for="c_state_country" class="text-black">State / Country <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                            </div>
                            <div class="col-md-6">
                                <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">Email Address <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                            </div>
                            <div class="col-md-6">
                                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="c_phone"
                                    placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="c_order_notes" class="text-black">Order Notes</label>
                            <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                placeholder="Write your notes here..."></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="c_order_notes" class="text-black pb-3">Payment methods</label>
                            <div class="border p-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="pay_DBT"
                                        data-bs-toggle="collapse" href="#collapsebank" role="button"
                                        aria-expanded="false" aria-controls="collapsebank">
                                    <label class="form-check-label" for="pay_DBT">
                                        Direct Bank Transfer
                                    </label>
                                    <div class="collapse" id="collapsebank">
                                        <div class="py-2">
                                            <p class="mb-0 text-secondary">Make your payment directly into our bank
                                                account. Please
                                                use your Order ID as the payment reference. Your order won’t be shipped
                                                until the funds have cleared in our account.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="pay_Paypal"
                                        data-bs-toggle="collapse" href="#collapsepaypal" role="button"
                                        aria-expanded="false" aria-controls="collapsepaypal">
                                    <label class="form-check-label" for="pay_Paypal">
                                        Paypal
                                    </label>
                                    <div class="collapse" id="collapsepaypal">
                                        <div class="py-2">
                                            <p class="mb-0 text-secondary">Make your payment directly into our bank
                                                account. Please
                                                use your Order ID as the payment reference. Your order won’t be shipped
                                                until the funds have cleared in our account.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Top Up T-Shirt <strong class="mx-2">x</strong> 1</td>
                                            <td>$250.00</td>
                                        </tr>
                                        <tr>
                                            <td>Polo Shirt <strong class="mx-2">x</strong> 1</td>
                                            <td>$100.00</td>
                                        </tr> 
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                            <td class="text-black">$350.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Discount</strong></td>
                                            <td class="text-black">$30.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td class="text-black font-weight-bold"><strong>$350.00</strong></td>
                                        </tr>
                                    </tbody>
                                </table>



                                <div class="form-group">
                                    <button class="btn btn-black btn-lg py-3 btn-block"
                                        onclick="window.location='thankyou.html'">Place Order</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
