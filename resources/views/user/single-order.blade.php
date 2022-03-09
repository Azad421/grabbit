@extends('user.layouts.main')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <h5 class="card-subtitle">{{ $order->job->job_title }}</h5>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    Order Title :
                                </div>
                                <div class="col-8">{{ $order->job->job_title }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    Order By :
                                </div>
                                <div class="col-8 text-primary">{{ $order->user->first_name . ' ' . $order->user->last_name }}</div>
                            </div>
                        </div>
                        <div class="col-6"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <h5 class="card-subtitle">Delivery Time Left</h5>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- End PAge Content -->
@endsection
