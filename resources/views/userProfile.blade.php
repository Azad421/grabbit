@extends('layouts.app')

@section('content')

    {{--    Start Jobs Details --}}
    <section class="singleJob second-bg">
        <div class="container">
            <div class="row">
                <div class="col-10 col-md-8 col-lg-6 mx-auto">
                    @include('user.layouts.error')
                    <div class="profile text-center">
                        <figure>
                            <img class="profile-pic" src="{{ asset('images/'.$user->image) }}" alt="">
                        </figure>
                        <h4 class="primary-text mt-3">{{ $user->first_name }} {{ $user->last_name }}</h4>
                        <p class="mb-3">{{ $user->about_me }}</p>
                        @if(Auth('user')->user())
                            @if( $user->id != Auth('user')->user()->id)
                                <a class="primary-btn" href="{{ route('inbox.create', $user->id) }}">Message Me</a>
                            @endif
                        @else
                            <a class="primary-btn" href="{{ route('inbox.create', $user->id) }}">Message Me</a>
                        @endif
                        <hr>
                        <div>
                            {{ $user->description }}
                        </div>
                        <p>Qualification : {{ $user->qualification }}</p>
                        <p>Country : {{ $user->country }}</p>
                        <p>District : {{ $user->district }}</p>
                        <p>Village : {{ $user->village }}</p>
                    </div>
                </div>
            </div>
            <div class="section_title primary-bg">
                <h4>Reviews ({{$user->review->count()}})</h4>
            </div>
            @foreach($user->review as $review)
                <div class="reviews">
                    <div class="">
                        <figure class="mb-0 review_user_image">
                            <img src="{{ asset('images/'. $review->fromUser->image) }}" alt="User name">
                        </figure>
                    </div>
                    <div class="pt-2">
                        <h5 class="review_user_name">{{ $review->fromUser->first_name }} {{ $review->fromUser->last_name }}</h5>
                        <div class="review_text">
                            {{ $review->comments }}
                        </div>
                        <span class="review_stars">
                        {{ showStars($review->rating) }}
                    </span>
                    </div>
                </div>
            @endforeach
            <div class="section_title primary-bg">
                <h4>Users Jobs ({{$user->job->count()}})</h4>
            </div>
            <div class="row jobs pt-0">

                @foreach($user->job->where('status_id', \App\Models\JobStatus::where( 'nickname', 'approved')->first()->status_id) as $job)
                    <div class="col-6 col-md-4 col-lg-3">

                        <div class="job-div">
                            <figure>
                                <a class="job_link" href="{{ route('job', $job->job_id) }}">
                                    <img src="{{ asset('./images/'.$job->image) }}" alt="{{ $job->job_title }}"
                                         class="img-fluid">
                                </a>
                            </figure>
                            <div class="job-desc">
                                <p class="job-name"><a class="job_link"
                                                       href="{{ route('job', $job->job_id) }}">{{ $job->job_title }}</a>
                                </p>
                                <p class="buyer-name text-muted">{{ $job->getCategory->category_name }}</p>
                                <p class="d-flex justify-content-between">
                                    <span><i class="fa-solid fa-eye me-2"></i>0</span>
                                    <span class="primary-text"><b>{{ price($job->budget) }}</b></span>
                                </p>
                                <p class="d-flex justify-content-between">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span class="primary-text ratings">
                                    {{ showStars($job->review->sum('rating')/5) }}
                                    ({{ round($job->review->sum('rating'))/5 ?? 0 }}/5)
                                </span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--    End Jobs Details --}}
    <!-- Render the radio buttons and marks -->


@endsection

