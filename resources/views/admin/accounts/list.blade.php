@extends('layouts.admin')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Account
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Create new account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Accounts</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select all invoices"></th>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Fullname</th>
                                        <th>Created</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td>{{ $user['id'] }}</td>
                                            <td>
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url({{ asset('assets/images/accounts/' . $user['avatar']) }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $user['username'] }}</div>
                                                        <div class="text-secondary">{{ $user['email'] }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="invoice.html" class="text-reset"
                                                    tabindex="-1">{{ $user['fullname'] }}</a>
                                            </td>
                                            <td>
                                                {{ $user['created_at'] }}
                                            </td>
                                            <td>
                                                @if ($user['role_id'] == 1)
                                                    <span class="badge bg-indigo text-indigo-fg">Admin</span>
                                                @else
                                                    <span class="badge bg-green text-green-fg">Client</span>
                                                @endif
                                            </td>
                                            <td>

                                                @if ($user['status_id'] == 1)
                                                    <span class="badge bg-green me-1"></span> Active
                                                @else
                                                    <span class="badge bg-red me-1"></span> Inactive
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item text-info" href="#">
                                                            Edit
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of
                                <span>16</span> entries
                            </p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M15 6l-6 6l6 6" />
                                        </svg>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        next
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 6l6 6l-6 6" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
