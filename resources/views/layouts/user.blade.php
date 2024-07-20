<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Cactus">
    <link rel="shortcut icon" href="{{ asset('assets/images/user/favicon.ico') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/user/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/user/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>@yield('title')</title>
    <style>
        #btn-chat {
            position: fixed;
            bottom: 40px;
            right: 40px;
        }

        .chat-main {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 400px;
            height: 600px;
            display: none;
        }

        .content-chat {
            height: 84%;
            overflow-y: auto;
            scrollbar-width: thin;
        }
    </style>
    @livewireStyles
</head>

<body>

    <!-- Header -->
    <livewire:partials.header-user />

    {{-- Main --}}
    <div class="l-main">
        {{-- Content  --}}
        @yield('content')

        {{-- Chat  --}}
        <div class="chat">
            <img src="{{ asset('assets/images/generals/chat.png') }}" id="btn-chat" width="50"
                class="img-fluid rounded-circle" />
            <div class="card chat-main" id="chat-main" style="border-radius: 15px;">
                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                    style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <p></p>
                    <p class="mb-0 fw-bold">Live chat</p>
                    <i class="fas fa-times" style="cursor: pointer;" id="btnClose"></i>
                </div>
                <div class="card-body p-0" style="height: calc(100% - 56px);">
                    <div class="content-chat p-3">
                        <div class="d-flex flex-row justify-content-start mb-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                <p class="small mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius odio
                                    laborum corporis in voluptas dolore. Similique tenetur quibusdam velit soluta,
                                    accusamus laborum nulla quisquam asperiores et cumque amet laudantium dignissimos
                                    ullam deserunt, ad consectetur, distinctio ipsa! Eligendi, ea! Hic debitis saepe
                                    maxime doloremque natus praesentium necessitatibus voluptate iure, accusantium
                                    nostrum omnis atque, tempora doloribus ad! Vel ab rem reiciendis sint? Suscipit,
                                    quas? Necessitatibus, repellat laborum dele oribus minus culpa
                                    libero! Omnis nulla officiis accusamus! Eius mollitia iste architecto officiis, odio
                                    animi quas molestiae ipsam consequuntur tempora! Accusamus ab quisquam ipsam saepe
                                    eum omnis ipsum eius voluptatem incidunt numquam debitis, dolor itaque quasi magnam
                                    impedit.</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end mb-4">
                            <div class="p-3 me-3 border bg-body-tertiary" style="border-radius: 15px;">
                                <p class="small mb-0">Thank you, I really like your product.</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>

                        <div class="d-flex flex-row justify-content-start mb-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                <p class="small mb-0">...</p>
                            </div>
                        </div>
                    </div>
                    <div data-mdb-input-init
                        class="m-3 pt-2 form-outline border-top text-muted d-flex justify-content-start align-items-center">
                        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                            placeholder="Type message">
                        <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                        <a class="ms-2 pe-1" href="#!"><i class="fas fa-paper-plane"
                                style="color: #386BC0"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <livewire:partials.footer-user />
    <script src="{{ asset('assets/js/user/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/user/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/user/custom.js') }}"></script>
    <script src="{{ asset('assets/js/user/search.js') }}"></script>
    <script>
        //Get the button
        let btnChat = document.getElementById("btn-chat");
        let chatMain = document.getElementById("chat-main");
        let btnClose = document.getElementById("btnClose");
        // When the user clicks on the button, hidden btnChat and show chatMain
        btnChat.onclick = function() {
            btnChat.style.display = "none";
            chatMain.style.display = "block";
        }
        // When the user clicks on the button, hidden chatMain and show btnChat
        btnClose.onclick = function() {
            btnChat.style.display = "block";
            chatMain.style.display = "none";
        }
    </script>
    @livewireScripts
</body>

</html>
