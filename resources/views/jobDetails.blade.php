@extends('layouts.app')

@section('content')

    {{--    Start Jobs Details --}}
    <section class="singleJob second-bg">
        <div class="container">
            @include('layouts.error')
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
                        <h6>By <a class="text-decoration-none text-dark"
                                  href="{{ route('user.profile', $job->user->id) }}">{{ $job->user->first_name }} {{ $job->user->last_name }}</a>
                        </h6>
                        <p>
                            <sapn class="text-warning">
                                {{ showStars($job->review->where('from_user', '!=', $job->user_id)->avg('rating')) }}
                            </sapn>
                            <span>({{ $job->review->where('from_user', '!=', $job->user_id)->avg('rating') ?? 0 }}/5)</span>
                            ||
                            <span>{{ $job->order->where('status', '!=', 4)->count() }} Order In Queue</span>
                        </p>
                        <p>
                            Price : {{ price($job->budget) }}
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
                <h4>Reviews ({{$job->review->where('from_user', '!=', $job->user_id)->count()}})</h4>
            </div>
            @foreach($job->review->where('from_user', '!=', $job->user_id) as $review)
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
        </div>
    </section>
    {{--    End Jobs Details --}}
    <!-- Render the radio buttons and marks -->


@endsection

