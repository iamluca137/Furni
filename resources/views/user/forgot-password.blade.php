@extends('layouts.user')
@section('title', 'Forgot Password')
@section('content')
    <!-- Start Blog Section -->
    <div class="login-section py-5 mt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h2 class="section-title">Forgot password</h2>
                    <p class="pt-2">Lost your password? Please enter your email address. You will receive a link to create a new password
                        via email.</p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <form action="#" method="post">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email">
                        </div> 
                        <button type="submit" class="btn btn-primary">Reset password</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->
@endsection
