@extends('layouts.user')
@section('title', 'Setting')
@section('content')
    <div class="container mb-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 p-0 mt-5 mb-2">
                <h1 class="m-0">Setting</h1>
            </div>
        </div>
        <div class="row mt-5 justify-content-between">
            <div class="col-md-3 p-0 border-end ">
                <div class="d-flex flex-column flex-shrink-0" style="width: 180px;">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <button class="nav-link px-1 active" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="true">
                                Public Profile
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-setting-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-setting" type="button" role="tab" aria-controls="nav-setting"
                                aria-selected="false">
                                Setting Account
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-notification-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-notification" type="button" role="tab"
                                aria-controls="nav-notification" aria-selected="false">
                                Notifications
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 p-0">
                <div class="tab-content mb-3 ms-5" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                        aria-labelledby="nav-profile-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <p class="h4 mb-5">
                                    My Profile
                                </p>
                                <div class="row mb-3">
                                    <div class="col-2">Username:</div>
                                    <div class="col">John Doe</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">Fullname:</div>
                                    <div class="col">
                                        <input type="text" class="form-control" value="John Doe" id="fullname"
                                            name="fullname" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">Gender:</div>
                                    <div class="col">

                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="option1">
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="option2">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="gender" id="orther"
                                                value="option3">
                                            <label class="form-check-label" for="orther">Orther</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">Date of birth:</div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <select class="form-select">
                                                    <option selected disabled>Year</option>
                                                    @for ($i = 2024; $i >= 1910; $i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-select">
                                                    <option selected disabled>Month</option>
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-select">
                                                    <option selected disabled>Day</option>
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 fw-bold d-flex align-items-center justify-content-center">
                                <div class="avatar-profile">
                                    <div class="d-flex justify-content-center mb-4">
                                        <img id="selectedAvatar"
                                            src="https://down-vn.img.susercontent.com/file/vn-11134004-7r98o-lr6qriluje6x60_tn"
                                            class="rounded-circle" style="width: 160px; height: 160px; object-fit: cover;"
                                            alt="example placeholder" />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div data-mdb-ripple-init class="btn btn-primary btn-rounded btn-sm py-1 px-3">
                                            <label class="form-label text-white m-1" for="customFile2">Choose file</label>
                                            <input type="file" class="form-control d-none" id="customFile2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="nav-setting" role="tabpanel" aria-labelledby="nav-setting-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0 me-5">
                                <p class="h4 mb-5">
                                    Setting Account
                                </p>
                                <div class="row mb-3">
                                    <div>
                                        <label class="form-label " for="email">Email:</label>
                                        <input type="text" class="form-control" value="blackwhilee04@gmail.com"
                                            id="email" name="email" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div>Password:</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label text-secondary" style="font-size: 14px"
                                            for="new-password">New Password:</label>
                                        <input type="password" class="form-control" value="blackwhilee04@gmail.com"
                                            id="new-password" name="new-password" />
                                    </div>
                                    <div class="col">
                                        <label class="form-label text-secondary" style="font-size: 14px"
                                            for="current-password">Current Password:</label>
                                        <input type="password" class="form-control" value="blackwhilee04@gmail.com"
                                            id="current-password" name="current-password" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div>
                                        <label class="form-label " for="phone">Phone Number:</label>
                                        <input type="text" class="form-control" value="0382606012" id="phone"
                                            name="phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div>
                                        <label class="form-label " for="address">Address:</label>
                                        <input type="text" class="form-control"
                                            value="Ngo 14 Ngach 126 Me Tri Ha, Nam Tu Liem, Ha Noi" id="address"
                                            name="address" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-1 mb-3">
                            <div class="col p-0 m-0">
                                <p class="h4 mb-3">
                                    Notification
                                </p>
                                <p class="mb-1">
                                    Would you like to delete your account?<br>
                                    If you delete your account, all your data will be permanently deleted. Please be
                                    careful.
                                </p>
                                <a href="#" class="text-danger">
                                    I want to delete my account
                                </a>
                            </div>
                        </div>
                        <div class="row m-1 mb-3">
                            <div class="col p-0 m-0">
                                <p class="h4 mb-3">
                                    Delete Account
                                </p>
                                <p class="mb-1">
                                    Would you like to delete your account?<br>
                                    If you delete your account, all your data will be permanently deleted. Please be
                                    careful.
                                </p>
                                <a href="#" class="text-danger">
                                    I want to delete my account
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-notification" role="tabpanel"
                        aria-labelledby="nav-notification-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <p class="h4 mb-5">
                                    Notifications
                                </p>
                                <div class="row mb-3">
                                    <div>
                                        <label class="form-label " for="email">Email:</label>
                                        <input type="text" class="form-control" value="blackwhilee04@gmail.com"
                                            id="email" name="email" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div>Password:</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label text-secondary" style="font-size: 14px"
                                            for="new-password">New Password:</label>
                                        <input type="password" class="form-control" value="blackwhilee04@gmail.com"
                                            id="new-password" name="new-password" />
                                    </div>
                                    <div class="col">
                                        <label class="form-label text-secondary" style="font-size: 14px"
                                            for="current-password">Current Password:</label>
                                        <input type="password" class="form-control" value="blackwhilee04@gmail.com"
                                            id="current-password" name="current-password" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div>
                                        <label class="form-label " for="phone">Phone Number:</label>
                                        <input type="text" class="form-control" value="0382606012" id="phone"
                                            name="phone" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div>
                                        <label class="form-label " for="address">Address:</label>
                                        <input type="text" class="form-control"
                                            value="Ngo 14 Ngach 126 Me Tri Ha, Nam Tu Liem, Ha Noi" id="address"
                                            name="address" />
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
