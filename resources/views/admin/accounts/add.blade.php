@extends('layouts.admin')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Add Account
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
                            <form class="card" method="post" action="{{ route('admin.account.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username"
                                                    placeholder="Username">
                                                @error('username')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Fullname</label>
                                                <input type="text" class="form-control" name="fullname"
                                                    placeholder="Fullname">
                                                @error('fullname')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email">
                                                @error('email')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" placeholder="Password"
                                                    name="password">
                                                @error('password')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" placeholder="Confirm Password"
                                                    name="password_confirmation">
                                                @error('password_confirmation')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                                @error('address')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Phone">
                                                @error('phone')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Avatar</label>
                                                <input type="file" class="form-control" name="avatar">
                                                @error('avatar')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3 me-3">
                                                <div class="form-label">Status</div>
                                                <select class="form-select" name="status">
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('status')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <div class="form-label mb-3">Role</div>
                                                <div class="">
                                                    @foreach ($roles as $role)
                                                        <label class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="role"
                                                                value="{{ $role->id }}"
                                                                {{ $role->id == 2 ? 'checked' : '' }}>
                                                            <span class="form-check-label">{{ $role->name }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @error('role')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="{{ route('admin.account') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">Add Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
