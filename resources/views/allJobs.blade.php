@extends('layouts.app')

@section('content')

    {{--    Start Jobs--}}
    <section class="jobs second-bg">
        <div class="container">
            <div class="row">
                @foreach($jobs as $job)
                <div class="col-md-4 col-lg-3 col-6">
                    <div class="job-div">
                        <figure>
                            <a class="job_link" href="{{ route('job', $job->job_id) }}">
                                <img src="{{ asset('./images/'.$job->image) }}" alt="{{ $job->job_title }}"
                                     class="img-fluid">
                            </a>
                        </figure>
                        <div class="job-desc">
                            <p class="job-name"><a class="job_link"
                                                   href="{{ route('job', $job->job_id) }}">{{ $job->job_title }}</a></p>
                            <p class="buyer-name text-muted">{{ substr($job->description, 0, 50) }}...</p>
                            <p class="d-flex justify-content-between">
                                <span><i class="fa-solid fa-eye me-2"></i>0</span>
                                <span class="primary-text"><b>${{ $job->budget }}</b></span>
                            </p>
                            <p class="d-flex justify-content-between">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span class="primary-text ratings">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    (5)
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    {{--    End Jobs--}}

@endsection
@section('script')

@endsection
