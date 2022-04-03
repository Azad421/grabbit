<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile"
             style="background: url({{ asset('assets/admin/images/background/user-info.jpg')}}">
            <!-- User profile image -->
            <div class="profile-img"><img src="{{ asset('images/profile.png') }}" alt="user"/>
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                                         role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->user_name }}</a>
                <div class="dropdown-menu animated flipInY">
                    <a href="{{ route('admin.setting') }}" class="dropdown-item"><i
                            class="ti-settings"></i> Setting</a>

                    <div class="dropdown-divider"></div>
                    <a href="login.html" class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"><i class="fa fa-power-off"></i> Logout</a>
                    <form method="POST" id="logoutForm" action="{{ route('admin.logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">PERSONAL</li>
                <li><a class="waves-effect waves-dark" href="{{ url('/admin/') }}" aria-expanded="false"><i
                            class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
                <li><a class="has-arrow waves-effect waves-dark" href="javascript:" aria-expanded="false"><i
                            class="mdi mdi-gift"></i><span class="hide-menu">Micro Jobs</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.category.index') }}">Category</a></li>
                        <li><a href="{{ route('admin.microjob.index') }}">Jobs</a></li>
                    </ul>
                </li>
                <li><a class="waves-effect waves-dark" href="{{ route('admin.users') }}" aria-expanded="false"><i
                            class="mdi mdi-account"></i><span class="hide-menu">User </span></a></li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
