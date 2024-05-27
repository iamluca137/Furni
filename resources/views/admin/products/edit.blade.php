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
                        Edit Product
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
                            <form class="card" method="post" action="{{ route('admin.product.update', $product->slug) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $product->name }}" placeholder="Name">
                                                @error('name')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <div class="form-label">Category</div>
                                                <select class="form-select" name="category_product_id">
                                                    <option selected disabled>-- Select Category --</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id == $product->category_product_id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_product_id')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Price</label>
                                                <input type="text" name="price" class="form-control"
                                                    value="{{ $product->price }}" placeholder="Price">
                                                @error('price')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label">Image</label>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="file" multiple class="form-control" name="images[]"
                                                        placeholder="Image">
                                                    @error('images')
                                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                                    @enderror
                                                    @error('images.*')
                                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row g-4 g-md-3">
                                                    @foreach ($product->images as $image)
                                                        <div class="col-1 image-box position-relative">
                                                            <a data-fslightbox="gallery"
                                                                href="{{ asset('assets/images/products/' . $image->image) }}">
                                                                <div class="img-responsive img-responsive-1x1 rounded-3 border"
                                                                    style="background-image: url({{ asset('assets/images/products/' . $image->image) }})">
                                                                </div>
                                                            </a>
                                                            <input type="hidden" name="old_images[]"
                                                                value="{{ $image->image }}">
                                                            <button type="button" class="btn-close position-absolute"
                                                                style="width: 2px; top: -20; right: 10;"></button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Quantity</label>
                                                <input type="text" name="quantity" class="form-control"
                                                    value="{{ $product->quantity }}" placeholder="Quantity">
                                                @error('quantity')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <div class="form-label">Status</div>
                                                <select class="form-select" name="status">
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ $status->id == $product->product_status_id ? 'selected' : '' }}>
                                                            {{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('status')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Description</label>
                                                <textarea class="form-control" name="description" id="" rows="5">{{ $product->description }}</textarea>
                                            </div>
                                            @error('description')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="{{ route('admin.product') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">Edit Product</button>
                                </div>
                            </form>
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
        $('.btn-close').click(function() {
            $(this).closest('.image-box').remove();
        });
    });
</script>
