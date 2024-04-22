@extends('layouts.admin')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none position-relative">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Product
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

                        <div class="row">
                            <div class="col m-3">
                                <ul>
                                    <li class="pb-2"><strong>Name:</strong> {{ $product->name }}</li>
                                    <li class="pb-2"><strong>Category:</strong> {{ $product->category->name }}</li>
                                    <li class="pb-2"><strong>Price:</strong> {{ $product->price }}</li>
                                    <li class="pb-2"><strong>Quantity:</strong> {{ $product->quantity }}</li>
                                    <li class="pb-2">
                                        <div class="tags-list"><strong>Tags:</strong>
                                            @foreach ($product->tags as $tag)
                                                <span class="badge badge-outline text-cyan">{{ $tag->name }}</span>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li class="pb-2"><strong>Status:</strong>
                                        @if ($product->product_status_id == 1)
                                            <span
                                                class="ms-1 badge bg-green text-green-fg">{{ $product->status->name }}</span>
                                        @elseif ($product->product_status_id == 2)
                                            <span class="ms-1 badge bg-red text-red-fg">{{ $product->status->name }}</span>
                                        @else
                                            <span
                                                class="ms-1 badge bg-yellow text-yellow-fg">{{ $product->status->name }}</span>
                                        @endif
                                    </li>
                                    <li class="pb-2" style="white-space: pre-line"><strong>Info:</strong>
                                        <p class="m-0 ms-5 py-2">{!! $product->info !!}</p>
                                    </li>
                                    <li class="pb-2"><strong>Description:</strong>
                                        <p class="m-0 ms-5 py-2">{!! $product->description !!}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
