<!DOCTYPE html>
<html lang="{{str_replace('_','-', app()->getLocale())}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png') }}" sizes="16x16" href="{{ asset('assets/assets/admin/images/favicon.png') }}">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('assets/admin/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}"
          rel="stylesheet">
    <link href="{{ asset('assets/admin/plugins/css-chart/css-chart.css') }}" rel="stylesheet">
    <!-- Dropify CSS -->
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/dropify/dist/css/dropify.min.css") }}">
    <!-- Vector CSS -->
    <link href="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('assets/admin/css/colors/purple-dark.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/custom.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
@include('user.layouts.header')
<!-- End Topbar header -->
@include('user.layouts.sidebar')
<!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles align-items-center">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">{{ $pageTitle }}</h3>
                    <ol class="breadcrumb">
                        @foreach($breadCrumb as $page)
                            <li class="breadcrumb-item"><a
                                    href="{{ route($page['route']) }}">{{ $page['title'] }}</a>
                            </li>
                        @endforeach
                        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Start Page Content -->

            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">{{ config('app.copyright') }}</footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('assets/admin/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
<!--stickey kit -->
<script src="{{ asset('assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('assets/admin/js/custom.min.js') }}"></script>
<!-- This is data table -->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="{{ asset('assets/admin/plugins/chartist-js/dist/chartist.min.js') }}"></script>
<script
    src="{{ asset('assets/admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<!-- Vector map JavaScript -->
<script src="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
<!-- Dropify JS -->
<script src="{{ asset('assets/admin/plugins/dropify/dist/js/dropify.min.js') }}"></script>
@php
    $currentRoute = \Illuminate\Support\Facades\Route::getCurrentRoute()->getName();
echo $currentRoute;
@endphp
@if($currentRoute == 'dashboard')
    <script src="{{ asset('assets/admin/js/dashboard3.js') }}"></script>
@endif
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{ asset('assets/admin/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
<script>
    $('#myTable').DataTable();

</script>
</body>

</html>
