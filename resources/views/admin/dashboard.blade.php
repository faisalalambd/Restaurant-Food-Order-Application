<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <title>Admin Dashboard</title>

    {{-- Favicon Icon --}}
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    {{-- Plugin CSS --}}
    <link href="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    {{-- Preloader CSS --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/css/preloader.min.css') }}" type="text/css" />
    {{-- Bootstrap CSS --}}
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    {{-- Icons CSS --}}
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- App CSS --}}
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <div id="layout-wrapper">

        {{-- Header Area --}}
        @include('admin.layout.header')

        {{-- Sidebar Area --}}
        @include('admin.layout.sidebar')

        <div class="main-content">

            {{-- Index Area --}}
            @yield('admin')

            {{-- Footer Area --}}
            @include('admin.layout.footer')

        </div>

    </div>

    {{-- Right Sidebar Area --}}
    @include('admin.layout.right_sidebar')

    {{-- Right Bar Overlay --}}
    <div class="rightbar-overlay"></div>

    {{-- jQuery --}}
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    {{-- Bootstrap JS --}}
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Metis Menu JS --}}
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    {{-- Simple Bar JS --}}
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    {{-- Waves JS --}}
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    {{-- Feather Icons JS --}}
    <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>
    {{-- Pace JS --}}
    <script src="{{ asset('backend/assets/libs/pace-js/pace.min.js') }}"></script>
    {{-- Apex Charts JS --}}
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    {{-- Plugins JS --}}
    <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
    {{-- Dashboard Init JS --}}
    <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>
    {{-- App JS --}}
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>

</html>
