@extends('user.layouts.main')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col p-r-0 align-self-center">
                        <h2 class="font-light m-b-0">{{ $jobs->count() }}</h2>
                        <h6 class="text-muted"><a href=""></a>Total Job</h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <div>
                            <span class="mdi mdi-gift text-themecolor dashboard-icon"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col p-r-0 align-self-center">
                        <h2 class="font-light m-b-0">
                            {{ $users->where('user_role', '1')->count() }}
                        </h2>
                        <h6 class="text-muted">Total Job Seeker</h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <span class="mdi mdi-account text-themecolor dashboard-icon"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col p-r-0 align-self-center">
                        <h2 class="font-light m-b-0">
                            {{ $users->where('user_role', '2')->count() }}
                        </h2>
                        <h6 class="text-muted">Total Employee</h6></div>
                    <!-- Column -->
                    <div class="col text-right ">
                        <span class="mdi mdi-account text-themecolor dashboard-icon"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col p-r-0 align-self-center">

                        <h2 class="font-light m-b-0">
                            @if(Auth::user()->role->nickname == 'employee')
                                {{ \App\Models\Order::all()->where('from_user', Auth::user()->id)->count() }}
                            @else
                                {{ \App\Models\Order::all()->where('to_user', Auth::user()->id)->count() }}
                            @endif
                        </h2>
                        <h6 class="text-muted">My Order</h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <span class="mdi mdi-gift text-themecolor dashboard-icon"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales Overview</h4>
                    <h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>
                    <div class="amp-pxl" style="height: 300px;"></div>
                    <div class="text-center">
                        <ul class="list-inline">
                            <li>
                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Ample</h6> </li>
                            <li>
                                <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Pixel</h6> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Newsletter Campaign</h4>
                    <h6 class="card-subtitle">Overview of Newsletter Campaign</h6>
                    <div class="campaign2 ct-charts" style="height: 300px;"></div>
                    <div class="text-center">
                        <ul class="list-inline">
                            <li>
                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Open Rate</h6> </li>
                            <li>
                                <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Recurring</h6> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Current Visitors</h4>
                    <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                    <div id="usa" style="height: 300px"></div>
                    <div class="text-center">
                        <ul class="list-inline">
                            <li>
                                <h6 class="text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Valley</h6> </li>
                            <li>
                                <h6 class="text-info"><i class="fa fa-circle font-10 m-r-10"></i>Newyork</h6> </li>
                            <li>
                                <h6 class="text-danger"><i class="fa fa-circle font-10 m-r-10"></i>Kansas</h6> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
@endsection
