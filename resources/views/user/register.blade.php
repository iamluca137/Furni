@extends('layouts.user')
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
                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username">
                        </div> 
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="mb-4">
                            <label for="cf-password" class="form-label">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="cf-password">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <div class="mt-3 d-flex justify-content-start">
                            Already have an account?
                            <a href="{{ route('login') }}" class="ps-1 text-info text-decoration-none">Login here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->
@endsection
