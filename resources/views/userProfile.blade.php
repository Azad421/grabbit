@extends('layouts.app')

@section('content')

    {{--    Start Jobs Details --}}
    <section class="singleJob second-bg">
        <div class="container">
            <div class="row">
                <div class="col-10 col-md-8 col-lg-6 mx-auto">
                    <div class="profile text-center">
                        <figure>
                            <img class="profile-pic" src="{{ asset('images/profile.png') }}" alt="">
                        </figure>
                        <h4 class="primary-text mt-3">{{ $user->first_name }} {{ $user->last_name }}</h4>
                        <p class="mb-3">{{ $user->about_me }}</p>
                        @if($user->id != Auth('user')->user()->id)
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
        </div>
    </section>
    {{--    End Jobs Details --}}
    <!-- Render the radio buttons and marks -->


@endsection

