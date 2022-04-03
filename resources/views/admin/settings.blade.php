@extends('admin.layouts.main')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        @include('admin.layouts.error')
                        <form method="post" action="{{ route('admin.changeEmail') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body col-sm-8 col-md-6 mx-auto">
                                <h3 class="card-title">Add Category</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-12">
                                        <div class="form-group @error('email') has-danger @enderror">
                                            <label class="control-label">Category Name</label>
                                            <input type="text" id="email" name="email"
                                                   value="{{ $user->email }}"
                                                   class="form-control @error('email') form-control-danger @enderror"
                                                   placeholder="Category Name">
                                            @error('email')
                                            <small class="form-control-feedback"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                        <form method="post" action="{{ route('admin.changePassword') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body col-sm-8 col-md-6 mx-auto">
                                <h3 class="card-title">Change Password</h3>
                                <hr>
                                <div class="col-12">
                                    <div class="form-group @error('cPassword') has-danger @enderror">
                                        <label class="control-label">Current Password</label>
                                        <input type="password" class="form-control @error('cPassword') form-control-danger @enderror" name="cPassword" id="cPassword">
                                        @error('cPassword')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group @error('password') has-danger @enderror">
                                        <label class="control-label">New Password</label>
                                        <input type="password" class="form-control @error('password') form-control-danger @enderror" name="password" id="password">
                                        @error('password')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End PAge Content -->
@endsection
