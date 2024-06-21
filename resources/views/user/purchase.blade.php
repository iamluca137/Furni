@extends('layouts.user')
@section('title', 'Setting')
<style>
    .dropdown-list-image {
        height: 5rem;
        width: 5rem;
    }

    .dropdown-list-image img {
        height: 5rem;
        width: 5rem;
    }

    .btn-light {
        color: #2cdd9b;
        background-color: #e5f7f0;
        border-color: #d8f7eb;
    }
</style>
@section('content')
    <div class="container mb-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 p-0 mt-5 mb-2">
                <h1 class="m-0">Your Purchase</h1>
            </div>
        </div>
        <div class="row my-5 pb-5 justify-content-between">
            <div class="col-md-3 p-0 border-end ">
                <div class="d-flex flex-column flex-shrink-0" style="width: 180px;">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <button class="nav-link px-1 active" id="nav-all-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all"
                                aria-selected="true">
                                All
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-payment-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-payment" type="button" role="tab" aria-controls="nav-payment"
                                aria-selected="false">
                                Awaiting Payment
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-shipping-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-shipping" type="button" role="tab" aria-controls="nav-shipping"
                                aria-selected="false">
                                Shipping
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-delivery-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-delivery" type="button" role="tab" aria-controls="nav-delivery"
                                aria-selected="false">
                                Awaiting Delivery
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-completed-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed"
                                aria-selected="false">
                                Completed
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-cancelled-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-cancelled" type="button" role="tab" aria-controls="nav-cancelled"
                                aria-selected="false">
                                Cancelled
                            </button>
                        </li>
                        <li>
                            <button class="nav-link px-1 link-dark" id="nav-return-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-return" type="button" role="tab" aria-controls="nav-return"
                                aria-selected="false" disabled>
                                Returns/Refunds
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 p-0">
                <div class="tab-content mb-3 ms-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-shipping" role="tabpanel" aria-labelledby="nav-shipping-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-return" role="tabpanel" aria-labelledby="nav-return-tab">
                        <div class="row m-1 mb-5">
                            <div class="col p-0 m-0">
                                <div class="box shadow-sm rounded mb-3 p-0">
                                    <div class="box-body p-0">
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item mb-3 p-3 bg-white border-bottom">
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center my-1">
                                                <div
                                                    class="dropdown-list-image me-3 d-flex align-items-center justify-content-center ">
                                                    <img src="https://down-vn.img.susercontent.com/file/6130f482c68c505ae53cdade105e43d6_tn"
                                                        alt="">
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate">DAILY RUNDOWN: MONDAY</div>
                                                    <div class="small">Nunc purus metus, aliquam vitae venenatis
                                                        sit amet, porta non est.</div>
                                                    <div class="small">x1</div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center border-top mt-4 justify-content-between pt-4">
                                                <p class="status-order text-success d-flex align-items-center m-0">Waiting
                                                    Payment</p>
                                                <div class="action-box">
                                                    <button type="button" class="btn btn-secondary mx-2 btn-sm rounded">
                                                        Feedback
                                                    </button>
                                                    <button type="button" class="btn btn-gray mx-2 btn-sm rounded">
                                                        Request Return/Refund
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
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
