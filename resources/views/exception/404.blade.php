<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Cactus">
    <link rel="shortcut icon" href="{{ asset('assets/images/user/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/user/bootstrap.min.css') }}" rel="stylesheet">
    <title>404 Not Found</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Salsa&display=swap");

        body {
            overflow-x: hidden;
            position: relative;
            -moz-user-select: none !important;
            -webkit-touch-callout: none !important;
            -webkit-user-select: none !important;
            -khtml-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
            font-family: "Salsa", cursive;
            background-color: #8eb3c7;
        }

        img {
            width: 40%;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center">
        <img src="{{ asset('assets/images/generals/404.png') }}">
    </div>
    <div class="text-center">
        <a href="{{ route('home') }}" style="font-size: 18px;" class="btn btn-dark px-3 py-2">
            Go Home
        </a>
    </div>
</body>

</html>
