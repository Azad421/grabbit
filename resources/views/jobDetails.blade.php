@extends('layouts.app')

@section('content')

    {{--    Start Jobs Details --}}
    <section class="singleJob second-bg">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <figure class="job_figure">
                        <img src="{{ asset('./images/'.$job->image) }}" alt="{{ $job->job_title }}"
                             class="img-fluid">
                    </figure>
                </div>
                <div class="col-6">
                    <div class="job_details ps-5">
                        <h4>{{ $job->job_title }}</h4>
                        <p>
                            <a href="{{ route('job.category', $job->getCategory->category_id) }}">{{ $job->getCategory->category_name }}</a>
                        </p>
                        <hr>
                        <h6>By {{ $job->user->first_name }} {{ $job->user->last_name }}</h6>
                        <p>
                            <sapn>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </sapn>
                            <span>(99)</span>
                            ||
                            <span>2 Order In Queue</span>
                        </p>
                        <hr>
                        <div class="desc">
                            {{ $job->description }}
                        </div>
                        <form action="{{ route('payment') }}" method="post">
                            @csrf
                            <div class="d-grid gap-2 mt-5">
                                <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                                <button class="btn primary-btn">Check Out Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="section_title primary-bg">
                <h4>Reviews (4)</h4>
            </div>
            <div class="reviews">
                <div class="">
                    <figure class="mb-0 review_user_image">
                        <img src="{{ asset('assets/admin/images/users/1.jpg') }}" alt="User name">
                    </figure>
                </div>
                <div class="pt-2">
                    <h5 class="review_user_name">User name </h5>
                    <div class="review_text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab deleniti eius esse fugit harum,
                        illum ipsam ipsum nulla officiis possimus repellendus sapiente similique veniam vero.
                    </div>
                    <span class="review_stars"><i class="fas fa-star"></i></span>
                </div>
            </div>
        </div>
    </section>
    {{--    End Jobs Details --}}
    <!-- Render the radio buttons and marks -->


@endsection

