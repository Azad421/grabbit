@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 col-10">
                @foreach(['danger', 'warning', 'success', 'info'] as $msg)
                    @if(session('alert-'.$msg))
                        <div class="alert alert-{{ $msg }} alert-dismissible fade show">{{ session('alert-'.$msg) }} <a
                                href="#" class="btn-close" data-bs-dismiss="alert" aria-label="close"></a></div>
                    @endif
                @endforeach
                <div class="card login">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-jobseeker-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-jobseeker" type="button" data-form="jobseeker" role="tab"
                                        aria-controls="nav-home"
                                        aria-selected="true">Job Seeker
                                </button>
                                <button class="nav-link" id="nav-employee-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-employee" type="button" data-form="employee" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Employee
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-jobseeker" role="tabpanel"
                                 aria-labelledby="nav-jobseeker-tab">
                                <form method="POST" class="p-3" action="{{ route('jobseeker.register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input id="firstName" type="text"
                                               class="form-control @error('j_firstName') is-invalid @enderror"
                                               name="j_firstName" value="{{ old('j_firstName') }}"
                                               autocomplete="j_firstName"
                                               placeholder="First Name"
                                               autofocus>
                                        @error('j_firstName')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input id="name" type="text"
                                               class="form-control @error('j_lastName') is-invalid @enderror"
                                               name="j_lastName" value="{{ old('j_lastName') }}"
                                               autocomplete="j_lastName"
                                               placeholder="Last Name"
                                               autofocus>
                                        @error('j_lastName')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input id="j_nid" type="text"
                                               class="form-control @error('j_nid') is-invalid @enderror"
                                               name="j_nid" value="{{ old('j_nid') }}"
                                               autocomplete="j_nid"
                                               placeholder="NID number"
                                               autofocus>
                                        @error('j_nid')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <select class="form-control @error('j_gender') is-invalid @enderror"
                                                    name="j_gender" autofocus>
                                                <option value="">Select Gender</option>
                                                <option value="Male" @if(old('j_gender') == 'Male') selected @endif>
                                                    Male
                                                </option>
                                                <option value="Female" @if(old('j_gender') == 'Female') selected @endif>
                                                    Female
                                                </option>
                                                <option value="Custom" @if(old('j_gender') == 'Custom') selected @endif>
                                                    Custom
                                                </option>
                                            </select>
                                            @error('j_gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input id="j_dob" type="date"
                                                   class="form-control @error('j_dob') is-invalid @enderror"
                                                   name="j_dob" value="{{ old('j_dob') }}"
                                                   autocomplete="j_dob"
                                                   placeholder="Date of Brith"
                                                   autofocus>
                                            @error('j_dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <input id="j_email" type="email"
                                               class="form-control @error('j_email') is-invalid @enderror"
                                               name="j_email"
                                               placeholder="Email"
                                               value="{{ old('j_email') }}" autocomplete="j_email">

                                        @error('j_email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input id="password" type="password"
                                               class="form-control @error('j_password') is-invalid @enderror"
                                               name="j_password"
                                               placeholder="Password" autocomplete="password">

                                        @error('j_password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input id="password" type="password" class="form-control"
                                               placeholder="Confirm Password"
                                               name="j_password_confirmation" autocomplete="password">
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn primary-btn">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-employee" role="tabpanel"
                                 aria-labelledby="nav-employee-tab">
                                <form method="POST" class="p-3" action="{{ route('register') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <input id="name" type="text"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               name="first_name" value="{{ old('first_name') }}"
                                               autocomplete="first_name"
                                               placeholder="First Name"
                                               autofocus>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input id="name" type="text"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               name="last_name" value="{{ old('last_name') }}" autocomplete="last_name"
                                               placeholder="Last Name"
                                               autofocus>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               placeholder="Email"
                                               value="{{ old('email') }}" autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               placeholder="Password"
                                               autocomplete="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input id="password-confirm" type="password" class="form-control"
                                               placeholder="Confirm Password"
                                               name="password_confirmation">
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn primary-btn">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('button.nav-link').click(function () {
            var form = $(this).data('form');
            console.log(form);
            localStorage.setItem('form', form);
        });
        var form = localStorage.getItem('form');
        if (form == 'jobseeker') {
            $('button.nav-link').removeClass('active');
            $('div.tab-pane').removeClass('show');
            $('div.tab-pane').removeClass('active');
            $('#nav-jobseeker-tab').addClass('active')
            $('#nav-jobseeker').addClass('active')
            $('#nav-jobseeker').addClass('show')
        } else if (form == 'employee') {
            $('button.nav-link').removeClass('active');
            $('div.tab-pane').removeClass('active');
            $('div.tab-pane').removeClass('show');
            $('#nav-employee-tab').addClass('active')
            $('#nav-employee').addClass('active')
            $('#nav-employee').addClass('show')
        }
    </script>
@endsection
