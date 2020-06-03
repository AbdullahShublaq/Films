<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Films</title>
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->

    @stack('styles')

    <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/morrisjs/morris.min.css')}}"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('dashboard_files/light/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/light/assets/css/color_skins.css')}}">



</head>
<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('favicon.ico')}}" width="48" height="48" alt="Oreo">
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href=""><img src="{{asset('favicon.ico')}}" width="30"
                                                               alt="Oreo"><span class="m-l-10">Films</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
        </li>

        <li class="float-right">
            <a href="{{route('dashboard.logout')}}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i> Logout</a>
        </li>
    </ul>
</nav>

@include('layouts.dashboard._aside')

@yield('content')

<!-- Jquery Core Js -->
<script src="{{asset('dashboard_files/light/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('dashboard_files/light/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('dashboard_files/light/assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{asset('dashboard_files/light/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('dashboard_files/light/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

<script src="{{asset('dashboard_files/light/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard_files/light/assets/js/pages/index.js')}}"></script>

@stack('scripts')

</body>
</html>