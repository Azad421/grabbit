@extends('admin.layouts.main')
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Add Category Form</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body col-sm-8 col-md-6 mx-auto">
                            @include('admin.layouts.error')
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group @error('category_name') has-danger @enderror">
                                        <label class="control-label">Category Name</label>
                                        <input type="text" id="category_name" name="category_name"
                                               value="{{ old('category_name') }}"
                                               class="form-control @error('category_name') form-control-danger @enderror"
                                               placeholder="Category Name">
                                        @error('category_name')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Category Status</label>
                                        <select class="form-control custom-select"
                                                name="category_status">
                                            @forelse($statuses as $status)
                                                <option
                                                    value="{{ $status->status_id }}">{{ $status->name }}</option>
                                            @empty
                                                <option value="">No status found</option>
                                            @endforelse
                                        </select>
                                        <small class="form-control-feedback"> Select category status</small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group @error('description') has-danger @enderror">
                                        <label class="control-label">Category Description</label>
                                        <textarea class="form-control @error('description') form-control-danger @enderror" name="description" placeholder="Category Description" id="description" cols="30" rows="3">{{ old('category_name') }}</textarea>
                                        @error('description')
                                        <small class="form-control-feedback"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group @error('image') has-danger @enderror">
                                        <label class="control-label">Category Logo</label>
                                        <input type="file" name="image" id="image" class="dropify">
                                        @error('image')
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
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <!-- End PAge Content -->
@endsection
