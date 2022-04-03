<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/LogoGrabIT.png') }}">
    <title>GrabbIT - Admin Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('assets/admin/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
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
<section id="wrapper">
    <div class="login-register"
         style="background-image:url({{ asset('assets/admin/images/background/login-register.jpg') }});">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <h3 class="box-title m-b-20">Sign In</h3>
                    @if(session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                   value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                            <small class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                   name="password" placeholder="Password">
                            @error('password')
                            <small class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i
                                    class="fa fa-lock m-r-5"></i> Forgot pwd?</a></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Log In
                            </button>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
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
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{ asset('assets/admin/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>

</html>
