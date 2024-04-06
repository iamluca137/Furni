<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('assets/images/user/favicon.ico') }}">

    <meta name="description" content="" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/user/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/user/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('partials.user.navbar')
    <!-- End Header/Navigation -->

    {{-- Start Main --}}
    @yield('content')
    {{-- End Main --}}


    <!-- Start Footer Section -->
    @include('partials.user.footer')
    <!-- End Footer Section -->

    <script src="{{ asset('assets/js/user/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/user/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/user/custom.js') }}"></script>
</body>

</html>
