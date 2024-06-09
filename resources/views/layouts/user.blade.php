<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Cactus">
    <link rel="shortcut icon" href="{{ asset('assets/images/user/favicon.ico') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/user/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/user/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>

<body>

    <!-- Header/Navigation -->
    @include('partials.user.navbar')

    {{-- Search  --}}
    @include('partials.user.search')
    {{-- Main --}}
    <div class="l-main">
        @yield('content')
    </div>
    <!-- Footer -->
    @include('partials.user.footer')

    <script src="{{ asset('assets/js/user/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/user/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/user/custom.js') }}"></script>
    <script src="{{ asset('assets/js/user/search.js') }}"></script>
</body>

</html>
