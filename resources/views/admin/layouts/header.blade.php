<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <!-- Logo icon --><b>
                    <!-- Light Logo icon -->
                    <img src="{{ asset('images/LogoGrabIT.png') }}" alt="homepage"
                         class="light-logo logo-icon"/>
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span>
                         <!-- Light Logo text -->
                        <h3 class="light-logo">{{ config('app.name', 'GrabbIT') }}</h3>
                </span>
            </a>

        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                        href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                <li class="nav-item"><a
                        class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="{{ asset('assets/admin/images/users/1.jpg') }}" alt="user"
                            class="profile-pic"/></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('images/profile.png') }}"
                                                            alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->user_name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('admin.setting') }}"><i class="ti-settings"></i> Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href=""
                                   onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"><i
                                        class="fa fa-power-off"
                                    ></i>
                                    Logout</a>
                                <form method="POST" id="logoutForm" action="{{ route('admin.logout') }}">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
