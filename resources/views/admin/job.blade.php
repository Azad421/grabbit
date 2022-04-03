@extends('admin.layouts.main')

@section('content')
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 align-items-center">
                            <h4 class="card-title">Micro Jobs</h4>
                            <h6 class="card-subtitle">Micro job details</h6>
                        </div>
                    </div>
                    @include('admin.layouts.error')
                    <figure>
                        <img src="{{ asset('./images/'.$microJob->image) }}" alt="{{ $microJob->job_title }}">
                    </figure>
                    <h4>{{ $microJob->job_title }}</h4>
                    <small>{{ $microJob->getCategory->category_name }}</small>
                    <h6>By <a class="text-decoration-none text-primary"
                              href="{{ route('user.profile', $microJob->user->id) }}">{{ $microJob->user->first_name }} {{ $microJob->user->last_name }}</a>
                    </h6>
                    <p>
                        <sapn class="text-warning">
                            {{ showStars($microJob->review->sum('rating')/5) }}
                        </sapn>
                        <span>({{ round($microJob->review->sum('rating'))/5 ?? 0 }}/5)</span>
                        ||
                        <span>{{ $microJob->order->where('status', '!=', 4)->count() }} Order In Queue</span>
                    </p>
                    <p>
                        Price : {{ price($microJob->budget) }}
                    </p>
                    <div class="desc">
                        {{ $microJob->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End PAge Content -->
@endsection
