@extends('layouts.admin')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            @if (session('success') || session('error'))
                <div>
                    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div>
                                {{ session('success') ?? session('error') }}
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                    <script>
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                $(this).remove();
                            });
                        }, 3000);
                    </script>
                </div>
            @endif
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Update Order
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-8">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Customer Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label class="col-3 col-form-label">Account:</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" readonly
                                                        placeholder="Account" value="&#64;{{ $order->user->username }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-3 col-form-label">Fullname:</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" readonly
                                                        placeholder="Fullname"
                                                        value="{{ $order->first_name . ' ' . $order->last_name }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-3 col-form-label">Email:</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" readonly placeholder="Email"
                                                        value="{{ $order->email }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-3 col-form-label">Phone:</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" readonly placeholder="Phone"
                                                        value="{{ $order->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Shipping Address</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-11">
                                            <div class="mb-3 row">
                                                <label class="col-2 col-form-label">Address:</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" readonly
                                                        placeholder="Address" value="{{ $order->address }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-2 col-form-label">Country:</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" readonly
                                                        placeholder="Country" value="{{ $order->country }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-2 col-form-label">City:</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" readonly placeholder="City"
                                                        value="{{ $order->city }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-2 col-form-label">Posta/Zip:</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" readonly
                                                        placeholder="Posta/Zip" value="{{ $order->zip_code }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Payment</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="row mt-3">
                                            <div class="col-3 fw-bold">Payment Method:</div>
                                            <div class="col">{{ $order->payment_method }}</div>
                                        </div>
                                        @if ($payment)
                                            <div class="row mt-3">
                                                <div class="col-3 fw-bold">ID Payment:</div>
                                                <div class="col">{{ $payment->payment_id }}</div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-3 fw-bold">Amount:</div>
                                                <div class="col">${{ $payment->amount }}</div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-3 fw-bold">Name:</div>
                                                <div class="col">{{ $payment->payer_name }}</div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-3 fw-bold">Email:</div>
                                                <div class="col">{{ $payment->payer_email }}</div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-3 fw-bold">Date:</div>
                                                <div class="col">{{ $payment->created_at }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Product Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <table class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderProducts as $orderProduct)
                                                    @php
                                                        $product = App\Models\Product::find($orderProduct->product_id);
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex py-1 align-items-center">
                                                                <span class="avatar me-2"
                                                                    style="background-image: url({{ asset('assets/images/products/' . $product->images->first()->image) }})">
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>
                                                            {{ $orderProduct->quantity }}
                                                        </td>
                                                        <td>
                                                            ${{ $orderProduct->quantity * $product->price }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Order Total</h3>
                                </div>
                                <div class="card-body pb-0">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $subTotal = 0;
                                            @endphp
                                            @foreach ($orderProducts as $orderProduct)
                                                @php
                                                    $product = App\Models\Product::find($orderProduct->product_id);
                                                    $subTotal += $orderProduct->quantity * $product->price;
                                                @endphp
                                                <tr>
                                                    <td>{{ $product->name }} <strong class="mx-2">x</strong>
                                                        {{ $orderProduct->quantity }}</td>
                                                    <td>${{ $orderProduct->quantity * $product->price }}</td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Order Subtotal</strong>
                                                </td>
                                                <td class="text-black">${{ $subTotal }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Discount</strong></td>
                                                <td class="text-black i_discount">
                                                    ${{ $order->discount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                                <td class="text-black font-weight-bold">
                                                    <strong>${{ $order->total_amount }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <form class="card" method="post" action="{{ route('admin.order.update', $order->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h3 class="card-title">Update Order</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col">
                                            <div class="mb-3 me-3">
                                                <select class="form-select" name="status">
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ $status->id == $order->order_status_id ? 'selected' : '' }}>
                                                            {{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('status')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="{{ route('admin.order') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">Update Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
