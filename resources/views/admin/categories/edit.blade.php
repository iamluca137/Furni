@extends('layouts.admin')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none position-relative">
        <div class="container-xl">
            @if (session('success') || session('error'))
                <div class="position-absolute top-0 end-0">
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
                        Edit Category
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
                            <form class="card" method="post" action="{{ route('admin.category.update', $category->slug) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $category->name }}" placeholder="Name">
                                                @error('name')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Avatar</label>
                                                <input type="file" class="form-control" name="image">
                                                @error('image')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 me-3">
                                                <div class="form-label">Status</div>
                                                <select class="form-select" name="status">
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ $status['id'] == $category['status'] ? 'selected' : '' }}>
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
                                    <a href="{{ route('admin.category') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">Edit Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
