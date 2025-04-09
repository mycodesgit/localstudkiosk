<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>CISS - Home</title>

    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free-V6/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/coas-style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/css/admission-style.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
    <!-- Logo  -->
    <link rel="shortcut icon" type="" href="{{ asset('template/img/cpsulogov4.png') }}">
    <style>
        .toast-top-right {
            margin-top: 50px;
        }
        .bg-light {
            background-color: #f8f9fa !important;
        }

        .bg-secondary {
            background-color: #e9ecef !important;
            color: #252525 !important;
        }
        .navbar-nav .nav-item .nav-link.active {
            background-color: #ffcc00 !important; /* Highlight color */
            color: black !important; /* Change text color */
            font-weight: bold;
            border-radius: 5px;
        }

    </style>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed text-sm">

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light" style="background-color: #04401f">
            <div class="container">
                <div href="" class="" style="color: #fff;font-family: Courier;">
                    CISS V.1.0 Student Kiosk
                </div>

                <div class="" style="z-index: 999">
                    <img src="{{ asset('template/img/cpsulogov4.png') }}" style="width:80px;" class="center-top">
                </div>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item {{ request()->routeIs('kioskhome') ? 'active' : '' }}">
                        <a href="{{ route('kioskhome') }}" class="nav-link {{ request()->routeIs('kioskhome') ? 'active' : '' }}" style="color: #fff">
                            <i class="fas fa-graduation-cap"></i> View Grades
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('kioskaccount') ? 'active' : '' }}">
                        <a href="{{ route('kioskaccount') }}" class="nav-link {{ request()->routeIs('kioskaccount') ? 'active' : '' }}" style="color: #fff">
                            <i class="fas fa-file-invoice"></i> View Accounts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" role="button" style="color: #fff">
                            <i class="fas fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container" style="padding-top: 20px">
                    
                </div>
            </div>
            <div class="content">
                @yield('body')
            </div>
        </div>
        <footer class="main-footer text-sm text-center" style="background-color: #04401f;">
            <div class="float-right d-none d-sm-inline "></div>
            <i class="text-light">CISS V.1.0: Maintained and Managed by Management Information System Office (MISO) under the Leadership of Dr. Aladino C. Moraca Copyright © 2023 CPSU, All Rights Reserved</i>
        </footer>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/coas.min.js') }}"></script>
    <script src="{{ asset('js/basic/contextmenucoas.js') }}"></script>
    <script src="{{ asset('js/basic/madapak.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('template/plugins/toastr/toastr.min.js') }}"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('template/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script>
        @if(Session::has('error'))
            toastr.options = {
                "closeButton":true,
                "progressBar":true,
                'positionClass': 'toast-top-right'
            }
            toastr.error("{{ session('error') }}")
        @endif
    </script>

</body>
</html>
   