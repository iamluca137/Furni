@extends('layouts.user')
@section('title', 'Change Password')
@section('content')
    <!-- Start Blog Section -->
    <div class="login-section py-5 mt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h2 class="section-title">Change your password</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="new-password" class="form-label">New Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="new-password">
                        </div>
                        <div class="mb-4">
                            <label for="cf-new-password" class="form-label">Confirm New Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="cf-new-password">
                        </div>
                        <button type="submit" class="btn btn-primary">Change password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->
@endsection
