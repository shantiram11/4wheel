<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    {{-- <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet"> --}}

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.css') }}" rel="stylesheet">
    {{-- <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet"> --}}

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
    {{-- <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet"> --}}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script> --}}
    {{-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-133433427-1');
    </script> --}}

</head>

<body class="layout-login-centered-boxed">

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

    <!-- App -->
    <script src="{{ asset('assets/js/toggle-check-all.js') }}"></script>
    <script src="{{ asset('assets/js/check-selected-row.js') }}"></script>
    <script src="{{ asset('assets/js/dropdown.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-mini.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('assets/js/app-settings.js') }}"></script>

</body>

</html>
