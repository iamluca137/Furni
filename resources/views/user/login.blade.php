@extends('layouts.user')
@section('title', 'Login')
@section('content')
    <!-- Start Blog Section -->
    <div class="login-section py-5 mt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h2 class="section-title">Login</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <form action="{{ route('loginPost') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                            @if (session('error'))
                                <div class="mt-1 text-danger">{{ session('error') }}</div>
                            @endif
                            @error('email')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('forgotPassword') }}" class="text-dark text-decoration-none">Forgot
                                password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <div class="mt-3 d-flex justify-content-start">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="ps-1 text-info text-decoration-none">Register now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->
@endsection
