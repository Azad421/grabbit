@extends('user.layouts.main')

@section('title')
    {{ $title }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/fliptimer.css') }}">
@endsection

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-7 col-xl-8 col-md-6">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <h4 class="card-subtitle">{{ $order->job->job_title }}</h4>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row mb-3">
                                <div class="col-4">
                                    Order Title :
                                </div>
                                <div class="col-8">{{ $order->job->job_title }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    Order By :
                                </div>
                                <div
                                    class="col-8 text-primary">{{ $order->user->first_name . ' ' . $order->user->last_name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    Order Note :
                                </div>
                                <div class="col-8 text-primary">{{ $order->order_note }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-3">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    Order Quantity :
                                </div>
                                <div class="col-4">{{ $order->quantity }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    Order Duration :
                                </div>
                                <div class="col-4">{{ $order->duration }} Days</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    Order Status :
                                </div>
                                <div class="col-4">{{ showStatus($order->statusInfo) }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    Price :
                                </div>
                                <div class="col-4">{{ $order->amount }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    Payment Statuor :
                                </div>
                                <div class="col-4">{{ status($order->payment) }}</div>
                            </div>
                        </div>
                    </div>
                    @php
                        if(Auth::user()->role->nickname == 'jobseeker'){
                            $from_user = \Illuminate\Support\Facades\Auth::user()->id;
                            $to_user = $order->user_id;
                        }elseif(Auth::user()->role->nickname == 'employee'){
                            $from_user = $order->job->user_id;
                            $to_user = \Illuminate\Support\Facades\Auth::user()->id;
                        }
                        $sellerReview = \App\Models\Review::where(['order_id' => $order->id, 'from_user' => $from_user, 'to_user' => $to_user ])->first();
                    @endphp
                    @if($sellerReview)
                        <div class="text-primary">
                            <h3 class="text-primary mb-3">@if(Auth::user()->role->nickname == 'jobseeker') Your @else
                                    Job Seekers @endif Review</h3>
                            <div class="row m-0 jobseekers_review mb-5">
                                <figure>
                                    <img src="{{ asset('images/'.$sellerReview->fromUser->image) }}"
                                         alt="{{ $sellerReview->fromUser->first_name }} {{ $sellerReview->fromUser->last_name }}">
                                </figure>
                                <div>
                                    <p class="my-3">{{ $sellerReview->fromUser->first_name }} {{ $sellerReview->fromUser->last_name }}
                                        <span><i
                                                class="mdi mdi-star text-warning"></i>{{ $sellerReview->rating }}/5</span>
                                    </p>
                                    {{ $sellerReview->comments }}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-primary mb-3">
                            <h3 class="text-primary">Write Review</h3>
                        </div>
                        <form action="{{ route('review.store') }}" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 @error('review') has-danger @enderror">
                                        <label for="review" class="form-label">Feedback</label>
                                        <textarea class="form-control @error('review') form-control-danger @enderror"
                                                  name="review" id="review" rows="3"></textarea>
                                        @error('review')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="ratings">
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="0"></span>
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="1"></span>
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="2"></span>
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="3"></span>
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="4"></span>
                                    </div>
                                    <input type="hidden" name="rating" value="0">
                                    <input type="hidden" name="order" value="{{ $order->id }}">
                                    @error('rating')
                                    <small class="form-control-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                                @csrf
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" id="save_review">Send</button>
                            </div>
                        </form>
                    @endif
                    @php
                        if(Auth::user()->role->nickname == 'employee'){
                                $from_user = \Illuminate\Support\Facades\Auth::user()->id;
                                $to_user = $order->job->user_id;
                            }elseif(Auth::user()->role->nickname == 'jobseeker'){
                                $from_user = $order->user_id;
                                $to_user = \Illuminate\Support\Facades\Auth::user()->id;
                            }
                            $employeeReview = \App\Models\Review::where(['order_id' => $order->id, 'from_user' => $from_user, 'to_user' => $to_user ])->first();
                    @endphp
                    @if($employeeReview)
                        <div class="">
                            <h3 class="text-primary mb-3">@if(Auth::user()->role->nickname == 'employee') Your @else
                                    Employee @endif Review</h3>
                            <div class="row m-0 jobseekers_review mb-5">
                                <figure class="mr-3">
                                    <img src="{{ asset('images/'.$employeeReview->toUser->image) }}"
                                         alt="{{ $employeeReview->toUser->first_name }} {{ $employeeReview->toUser->last_name }}">
                                </figure>
                                <div>
                                    <p class="mt-2 mb-1">{{ $employeeReview->toUser->first_name }} {{ $employeeReview->toUser->last_name }}
                                        <span class="ml-2"><i class="mdi mdi-star text-warning"></i>({{ $employeeReview->rating }}/5)</span>
                                    </p>
                                    {{ $employeeReview->comments }}
                                </div>
                            </div>
                        </div>
                    @elseif(Auth::user()->role->nickname == 'employee')
                        <div class="text-primary mb-3">
                            <h3 class="text-primary">Write Review</h3>
                        </div>
                        <form action="{{ route('review.store') }}" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3 @error('review') has-danger @enderror">
                                        <label for="review" class="form-label">Feedback</label>
                                        <textarea class="form-control @error('review') form-control-danger @enderror"
                                                  name="review" id="review" rows="3"></textarea>
                                        @error('review')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="ratings">
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="0"></span>
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="1"></span>
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="2"></span>
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="3"></span>
                                        <span class="mdi mdi-star mdi-18px rat_star" data-index="4"></span>
                                    </div>
                                    <input type="hidden" name="rating" value="0">
                                    <input type="hidden" name="order" value="{{ $order->id }}">
                                    @error('rating')
                                    <small class="form-control-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                                @csrf
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" id="save_review">Send</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-5 col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <h5 class="card-subtitle">Delivery Time Left</h5>
                    </center>

                    <ul id="example">
                        <li><span class="days">00</span>
                            <p class="days_text">Days</p></li>
                        <li class="seperator">:</li>
                        <li><span class="hours">00</span>
                            <p class="hours_text">Hours</p></li>
                        <li class="seperator">:</li>
                        <li><span class="minutes">00</span>
                            <p class="minutes_text">Minutes</p></li>
                        <li class="seperator">:</li>
                        <li><span class="seconds">00</span>
                            <p class="seconds_text">Seconds</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Row -->
    <!-- End PAge Content -->
@endsection
@section('script')
    <script src="{{ asset('assets/admin/js/jquery.syotimer.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.countdown.js') }}"></script>

    <script>

        $('#example').countdown({
            date: "{{ \Carbon\Carbon::parse($order->created_at)->addDay($order->duration)->format('m/d/Y h:i:s') }}"
        }, function () {
            alert('Merry Christmas!');
        });

        $(document).ready(function () {

            //rating('.sel-rat','seller_rating');
            rating('.rat_star', 'job_rating', '[name="rating"]');

            function rating(classes, indexes, rating) {
                resetStarColor();
                var ratedIndex = -1;
                remindRated();
                $(classes).mouseover(function () {
                    resetStarColor();
                    var currIndex = parseInt($(this).data("index"));
                    for (i = 0; i <= currIndex; i++) {
                        setStar(currIndex);
                    }
                });
                $(classes).click(function () {
                    ratedIndex = parseInt($(this).data('index'));
                    localStorage.setItem(indexes, ratedIndex);

                });
                $(classes).mouseleave(function () {
                    resetStarColor();
                    if (ratedIndex != -1) {
                        setStar(ratedIndex);
                    }
                    remindRated();

                });

                function setStar(max) {
                    for (i = 0; i <= max; i++) {
                        $(classes + ':eq(' + i + ')').css('color', '#ffc107');
                    }
                    $(rating).val(max + 1);
                }

                function resetStarColor() {
                    $(classes).css('color', '#888');
                };

                function remindRated() {

                    if (localStorage.getItem(indexes) != null) {
                        setStar(parseInt(localStorage.getItem(indexes)));

                    }
                }
            }

            $("#savreview").click(function (e) {
                e.preventDefault();
                var rating = localStorage.getItem('product_rating');
                if (rating == null) {
                    rating = 0;
                } else {
                    rating = parseInt(rating) + 1;
                }
                var url = "{{ route('review.store') }}";
                var order = "{{ $order->id }}";
                var comm = $("#review").val();
                var token = $('input[name="_token"]').val();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        rating: rating,
                        comment: comm,
                        order: order,
                        _token: token,
                        action: 'saveReview'
                    },
                    dataType: "Json",
                    success: function (response) {
                        window.location.href = url + 'order-list';
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });

        });
    </script>
@endsection

