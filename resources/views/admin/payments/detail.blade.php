@extends('layouts.admin')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Payment Detail
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
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Payment</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards py-3">
                                        <div class="row mt-3">
                                            <div class="col-3 fw-bold">Payment Method:</div>
                                            <div class="col">{{ $payment->payment_method }}</div>
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
                                                <div class="col-3 fw-bold">Status:</div>
                                                <div class="col">{{ $payment->payment_status }}</div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-3 fw-bold">Created:</div>
                                                <div class="col">{{ $payment->created_at }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
