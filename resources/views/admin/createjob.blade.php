@extends('admin.layouts.main')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles align-items-center">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Micro Job</a></li>
                <li class="breadcrumb-item active">Create Micro Job</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- Start Page Content -->
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Create New Micro Job</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.microjob.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body col-sm-8 col-md-6 mx-auto">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group @error('job_title') has-danger @enderror">
                                        <label class="control-label" for="job_title">Title</label>
                                        <input type="text" id="job_title" name="job_title"
                                               class="form-control @error('job_title') form-control-danger @enderror"
                                               placeholder="Title..." value="{{ old('job_title') }}">
                                        @error('job_title')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('category') has-danger @enderror">
                                        <label class="control-label" for="category">Category</label>
                                        <select
                                            class="form-control custom-select @error('category') form-control-danger @enderror"
                                            name="category" id="category">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('job_duration') has-danger @enderror">
                                        <label class="control-label" for="job_duration">Job Duration</label>
                                        <input type="text"
                                               class="form-control @error('job_duration') form-control-danger @enderror"
                                               name="job_duration" placeholder="Day(s)" value="{{ old('job_duration') }}">
                                        @error('job_duration')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('budget') has-danger @enderror">
                                        <label
                                            class="control-label @error('budget') has-danger @enderror" for="budget">Budget</label>
                                        <input type="text" name="budget" id="budget"
                                               class="form-control @error('budget') form-control-danger @enderror"
                                               placeholder="Budget" value="{{ old('budget') }}">
                                        @error('budget')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group @error('image') has-danger @enderror">
                                        <label class="control-label" for="description">Job Description</label>
                                        <input type="file" name="image" class="dropify @error('image') form-control-danger @enderror" id="job_image">
                                        @error('image')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group @error('description') has-danger @enderror">
                                        <label class="control-label" for="description">Job Description</label>
                                        <textarea name="description"
                                                  class="form-control @error('description') form-control-danger @enderror"
                                                  id="description" cols="30" rows="3"
                                                  placeholder="Job Description..">{{ old('description') }}</textarea>
                                        @error('description')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                            <button type="reset" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <!-- End PAge Content -->
    <script>
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();

        });
    </script>
@endsection
