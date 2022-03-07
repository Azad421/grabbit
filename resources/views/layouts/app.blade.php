<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="icon" href="{{ asset('./images/LogoGrabIT.png')}}" type="image/svg+xml">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owlcarousel/owl.theme.default.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--    jquery--}}
    <script src="{{ asset('js/jquery.min.js')}}"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbar_top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="brand-logo" src="{{ asset('./images/LogoGrabIT.png') }}" alt="">
                {{ config('app.name', 'GrabbIT') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:">{{ __('About') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:">{{ __('Training') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:">{{ __('Event') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:">{{ __('FAQ') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:">{{ __('Contact') }}</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest('user')
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth('user')->user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    {{ __('Dashboard') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="">
        @yield('content')
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="social-icons">
                            <a href="javascript:" class="social-icon">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="javascript:" class="social-icon">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="javascript:" class="social-icon">
                                <i class="fa-brands fa-google"></i>
                            </a>
                            <a href="javascript:" class="social-icon">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="javascript:" class="social-icon">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                            <a href="javascript:" class="social-icon">
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row subscribe">
                    <div class="col-md-3 col-12 my-auto">
                        <p class="m-0"><b>Sign up for newsletter</b></p>
                    </div>
                    <div class="col-md-7 col-12">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="col-md-2 col-12 text-end">
                        <button class="btn btn-primary-outline">Subscribe</button>
                    </div>
                    <div class="col-12 mt-4 text-center">
                        <p class="text-white">"GrabIT, one of the famous website in the gig economy where people offer
                            their time and services as housebreakers, movers, furniture, furniture assemblers..."</p>
                    </div>
                </div>
                <div class="row text-center text-white">
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <p><b>GrabIT</b></p>
                        <a class="footer-logo" href="javascript:">
                            <img src="{{ asset("./images/LogoGrabIT.png") }}" alt="">
                        </a>
                        <p>Brunei Micro Job, Ground Floor Jalan Kiarong, KM 1 Bandar Seri Begawan Negara Brunei
                            Darussalam Hotline +673-8239933</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4 footer-links">
                        <p><b>FOR JOB SEEKERS</b></p>
                        <a href="javascript:">Whats new for you?</a>
                        <a href="javascript:">Tutorial</a>
                        <a href="javascript:">Training</a>
                        <a href="javascript:">Gallery</a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4 footer-links">
                        <p><b>FOR EMPLOYERS</b></p>
                        <a href="javascript:">Whats new for you?</a>
                        <a href="javascript:">Tutorial</a>
                        <a href="javascript:">Register as Employer</a>
                        <a href="javascript:">Business Reporting</a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mb-4 footer-links">
                        <p><b>QUICK LINKS</b></p>
                        <a href="javascript:">Faq</a>
                        <a href="javascript:">About us</a>
                        <a href="javascript:">Downloads</a>
                        <a href="javascript:">Contact us</a>
                    </div>
                </div>
                <hr>
                <div class="copy-right">
                    <p>@php echo '@'.date('Y'); @endphp</p>
                    <p>Disclaimer | Privacy Policy & Terms of Use</p>
                </div>
            </div>
        </footer>
    </main>
</div>
@yield('script')
<script src="{{ asset('js/script.js')}}"></script>

</body>
</html>
