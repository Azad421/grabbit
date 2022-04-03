@extends('user.layouts.main')

@section('title')
    {{ $user->first_name . ' ' . $user->last_name }}
@endsection

@section('content')

    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"><img src="{{ asset('images/'.$user->image) }} " class="img-circle"
                                                width="150" height="150" style="object-fit: cover"/>
                        <h4 class="card-title m-t-10">{{ $user->first_name . ' ' . $user->last_name }}</h4>
                        <h6 class="card-subtitle">{{ $user->about_me }}</h6>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    <small class="text-muted">Email address </small>
                    <h6>{{ $user->email }}</h6>
                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6>{{ $user->contact_no }}</h6>
                    <small class="text-muted p-t-30 db">NID Number</small>
                    <h6>{{ $user->nid_num }}</h6>
                    <small class="text-muted p-t-30 db">Qualification</small>
                    <h6>{{ $user->qualification }}</h6>
                    <small class="text-muted p-t-30 db">Gender</small>
                    <h6>{{ $user->gender }}</h6>
                    <small class="text-muted p-t-30 db">Date Of Birth</small>
                    <h6>{{ $user->date_of_birth }}</h6>
                    <small class="text-muted p-t-30 db">Address</small>
                    <h6>{{ $user->village }} @if($user->district) , $user->district @endif @if($user->country) ,
                        $user->country @endif</h6>
                    <div class="text-center">
                        <a href="{{ route('acc.deactivate') }}">Deactivate Account</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!--second tab-->
                    <div class="tab-pane active" id="settings" role="tabpanel">
                        <div class="card-body">
                            @include('admin.layouts.error')
                            <form class="form-horizontal form-material" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group @error('first_name') has-danger @enderror">
                                            <label class="col-12">Profile Image</label>
                                            <div class="col-12">
                                                <input type="file" name="image"
                                                       class="dropify"
                                                       data-default-file="{{ asset('images/'.$user->image) }}">
                                                <input type="hidden" value="{{ $user->image }}" name="oldImage">
                                                @error('image')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group @error('first_name') has-danger @enderror">
                                            <label class="col-12">First Name</label>
                                            <div class="col-12">
                                                <input type="text" name="first_name"
                                                       class="form-control form-control-line"
                                                       value="{{ old('first_name', $user->first_name) }}"
                                                       placeholder="Type First Name...">
                                                @error('first_name')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group @error('last_name') has-danger @enderror">
                                            <label class="col-12">Last Name</label>
                                            <div class="col-12">
                                                <input type="text" name="last_name"
                                                       class="form-control form-control-line"
                                                       value="{{ old('last_name', $user->last_name) }}"
                                                       placeholder="Type Last Name...">
                                                @error('last_name')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group @error('about_me') has-danger @enderror">
                                    <label for="example-email" class="col-md-12">About Me</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Type About Me..."
                                               class="form-control form-control-line"
                                               value="{{ old('about_me', $user->about_me) }}" name="about_me">
                                        @error('about_me')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group @error('email') has-danger @enderror">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="Type Email..."
                                                       class="form-control form-control-line"
                                                       value="{{ old('email', $user->email) }}" name="email" disabled>
                                                @error('email')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group @error('contact_no') has-danger @enderror">
                                            <label for="example-email" class="col-md-12">Contact Number</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line"
                                                       value="{{ old('contact_no', $user->contact_no) }}"
                                                       placeholder="Type Contact Number..." name="contact_no">
                                                @error('contact_no')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group @error('nid_num') has-danger @enderror">
                                            <label class="col-md-12">NID Number</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Type NID Number..."
                                                       value="{{ old('nid_num', $user->nid_num) }}"
                                                       class="form-control form-control-line" name="nid_num">
                                                @error('nid_num')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group @error('qualification') has-danger @enderror">
                                            <label class="col-md-12">Qualification</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Type Qualification..."
                                                       value="{{ old('qualification', $user->qualification) }}"
                                                       class="form-control form-control-line">
                                                @error('qualification')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group @error('gender') has-danger @enderror">
                                            <label class="col-sm-12">Select Gender</label>
                                            <div class="col-sm-12">
                                                <select class="form-control form-control-line" name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male"
                                                            @if(old('gender', $user->gender) == 'Male') selected @endif>
                                                        Male
                                                    </option>
                                                    <option value="Female"
                                                            @if(old('gender', $user->gender) == 'Female') selected @endif>
                                                        Female
                                                    </option>
                                                    <option value="Custom"
                                                            @if(old('gender', $user->gender) == 'Custom') selected @endif>
                                                        Custom
                                                    </option>
                                                </select>
                                            </div>
                                            @error('gender')
                                            <small class="form-control-feedback"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group @error('date_of_birth') has-danger @enderror">
                                            <label class="col-sm-12">Date Of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control form-control-line"
                                                       name="date_of_birth"
                                                       value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                                @error('date_of_birth')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group @error('country') has-danger @enderror">
                                            <label class="col-sm-12">Select Country</label>
                                            <div class="col-sm-12">
                                                <select class="form-control form-control-line" name="country">
                                                    <option value="">Select Country</option>
                                                    <option>London</option>
                                                    <option>India</option>
                                                    <option>Usa</option>
                                                    <option>Canada</option>
                                                    <option>Thailand</option>
                                                </select>
                                                @error('country')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group @error('district') has-danger @enderror">
                                            <label class="col-sm-12">Select District</label>
                                            <div class="col-sm-12">
                                                <select class="form-control form-control-line" name="district">
                                                    <option value="">Select District</option>
                                                    <option>London</option>
                                                    <option>India</option>
                                                    <option>Usa</option>
                                                    <option>Canada</option>
                                                    <option>Thailand</option>
                                                </select>
                                                @error('district')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group @error('village') has-danger @enderror">
                                            <label class="col-sm-12">Village</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="village" placeholder="Type Village..."
                                                       class="form-control form-control-line"
                                                       value="{{ old('village', $user->village) }}">
                                                @error('village')
                                                <small class="form-control-feedback"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- End PAge Content -->
    <script>
        // var url = window.location.href;
        // var activeTab = url.substring(url.indexOf("#") +1);
        // console.log(activeTab)
        // if(url != activeTab && activeTab != '') {
        //     $(".tab-pane").removeClass("active");
        //     $('.nav-item a.nav-link').removeClass("active");
        //     $("#" + activeTab).addClass("active");
        //     $("[href='#" + activeTab+"'").addClass("active");
        // }
        // $('.nav-item a.nav-link').click(function () {
        //     let tabid = $(this).attr('href');
        //     window.location.hash = tabid;
        //     return true;
        // });
    </script>
@endsection
@section('script')
    <!-- Dropify JS -->
    <script src="{{ asset('assets/admin/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();

        });
    </script>
@endsection
