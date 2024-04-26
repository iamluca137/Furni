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
                        Trash Account
                    </h2>
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
                        <div class="">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr> 
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
                                    @foreach ($trashes as $trash)
                                        <tr> 
                                            <td>{{ $trash->id }}</td>
                                            <td>
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url({{ asset('assets/images/accounts/' . $trash->avatar) }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $trash->username }}</div>
                                                        <div class="text-secondary">{{ $trash->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="invoice.html" class="text-reset"
                                                    tabindex="-1">{{ $trash->fullname }}</a>
                                            </td>
                                            <td>
                                                {{ $trash['created_at'] }}
                                            </td>
                                            <td>
                                                @if ($trash->role == 1)
                                                    <span class="badge bg-indigo text-indigo-fg">Admin</span>
                                                @else
                                                    <span class="badge bg-green text-green-fg">Client</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($trash->status == 1)
                                                    <span class="badge bg-green me-1"></span> Active
                                                @elseif ($trash->status == 2)
                                                    <span class="badge bg-warning me-1"></span> Inactive
                                                @else
                                                    <span class="badge bg-red me-1"></span> Banned
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item text-info"
                                                            onclick="return confirm('Are you sure?')"
                                                            href="{{ route('admin.account.restore', $trash->id) }}">
                                                            Restore
                                                        </a>
                                                        <a class="dropdown-item text-danger"
                                                            onclick="return confirm('Are you sure?')"
                                                            href="{{ route('admin.account.destroy', $trash->id) }}">
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
                        <div class="card-footer">
                            {{ $trashes->onEachSide(2)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
