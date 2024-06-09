@extends('layouts.user')
@section('title', 'Register')
@section('content')
    <!-- Start Blog Section -->
    <div class="login-section py-5 mt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h2 class="section-title">Register</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <form action="{{ route('registerPost') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email">
                            @error('email')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" name="username">
                            @error('username')
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
                        <div class="mb-4">
                            <label for="cf-password" class="form-label">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="cf-password" name="cf-password">
                            @error('cf-password')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <div class="mt-3 d-flex justify-content-start">
                            Already have an account?
                            <a href="{{ route('login') }}" class="ps-1 text-info text-decoration-none">Login here</a>
                        </div>
                    </form>
                </div>
            </div>
            @if (session('success') || session('error'))
                <div class="modal fade exampleModal" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border-radius: 30px">
                            @if (session('success'))
                                <div class="success-popup p-0 m-0">
                                    <div class="modal-header d-flex justify-content-center" style="padding: 70px 0">
                                        <img src="{{ asset('assets/images/generals/success.png') }}" alt="">
                                    </div>
                                    <div class="modal-body text-center">
                                        <h3 class="modal-title text-center text-dark" style="color: #00D1B2 !important">
                                            Success
                                        </h3>
                                        <p>Congratulations, your account has been successfully created.</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center mb-4">
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    </div>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="error-popup p-0 m-0">
                                    <div class="modal-header d-flex justify-content-center" style="padding: 70px 0">
                                        <img src="{{ asset('assets/images/generals/error.png') }}" alt="">
                                    </div>
                                    <div class="modal-body text-center">
                                        <h3 class="modal-title text-center text-dark" style="color: #FF385F !important">Oh
                                            no!
                                        </h3>
                                        <p>Something went wrong, please try again.</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center mb-4">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                            Try Again
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(window).on('load', function() {
                        // click button to show modal
                        console.log(123);
                        $('.exampleModal').modal('show');
                    });
                </script>
            @endif
        </div>
    </div>

    <!-- End Blog Section -->
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
