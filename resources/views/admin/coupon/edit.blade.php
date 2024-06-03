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
                        Edit Coupon
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
                        <div class="col-12">
                            <form class="card" method="post" action="{{ route('admin.coupon.update', $coupon->code) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Code</label>
                                                <input type="text" class="form-control" name="code" value="{{ $coupon->code }}"
                                                    placeholder="Code">
                                                @error('code')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Discount</label>
                                                <input type="text" class="form-control" name="discount" value="{{ $coupon->discount }}"
                                                    placeholder="Discount">
                                                @error('discount')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Quantity</label>
                                                <input type="text" class="form-control" name="quantity" value="{{ $coupon->quantity }}"
                                                    placeholder="Quantity">
                                                @error('quantity')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Valid From</label>
                                                <input type="datetime-local" class="form-control" name="valid_from" value="{{ $coupon->valid_from }}"
                                                    placeholder="Valid From">
                                                @error('valid_from')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Valid Until</label>
                                                <input type="datetime-local" class="form-control" name="valid_until" value="{{ $coupon->valid_until }}"
                                                    placeholder="Valid Until">
                                                @error('valid_until')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="{{ route('admin.coupon') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">Edit Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
