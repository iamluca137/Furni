<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/css/admin/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/admin/tabler-flags.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/admin/tabler-payments.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/admin/tabler-vendors.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/admin/demo.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    @livewireStyles
</head>

<body>
    <script src="{{ asset('assets/js/admin/demo-theme.js') }}"></script>
    <div class="page">
        <!-- Header -->
        <livewire:partials.header-admin />

        <div class="page-wrapper">
            <!-- Page body -->
            @yield('content')
            <!-- Footer -->
            <livewire:partials.footer-admin />
        </div>
        
    </div>


    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/fslightbox/index.js') }}" defer></script>
    <script src="{{ asset('assets/libs/tom-select/dist/js/tom-select.base.js') }}" defer></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.js') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.js') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/admin/tabler.js') }}" defer></script>
    <script src="{{ asset('assets/js/admin/demo.js') }}" defer></script>

    @livewireScripts
</body>

</html>
