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
                        Orders
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
                            <h3 class="card-title">Orders</h3>
                        </div>
                        <div>
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr class="text-center">
                                        <th>Order</th>
                                        <th>Customer</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="text-center">
                                            <td>#{{ $order->id }}</td>
                                            <td>{{ $order->user->username }} </td>
                                            <td>{{ $order->payment_method }} </td>
                                            <td>
                                                @if ($order->order_status_id == 1)
                                                    <span class="badge bg-lime me-1"></span> Pending
                                                @elseif ($order->order_status_id == 2)
                                                    <span class="badge bg-yellow me-1"></span> Shipping
                                                @elseif ($order->order_status_id == 3)
                                                    <span class="badge bg-green me-1"></span> Completed
                                                @elseif ($order->order_status_id == 4)
                                                    <span class="badge bg-red me-1"></span> Cancelled
                                                @else
                                                    <span class="badge bg-secondary me-1"></span> Returns/Refunds
                                                @endif
                                            </td>
                                            <td>
                                                {{ $order->created_at }}
                                            </td>
                                            <td>
                                                ${{ $order->total_amount }}
                                            </td>
                                            <td>
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item text-info"
                                                            href="{{ route('admin.order.edit', $order->id) }}">
                                                            Update  
                                                        </a>
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('order.invoice', $order->id) }}">
                                                            Invoice
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
                            {{ $orders->onEachSide(2)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
