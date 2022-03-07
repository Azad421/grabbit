@extends('admin.layouts.main')

@section('title')
    {{ $category->category_name }}
@endsection

@section('content')
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.category.update', $category->category_id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body col-sm-8 col-md-6 mx-auto">
                                <h3 class="card-title">Add Category</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group @error('category_name') has-danger @enderror">
                                            <label class="control-label">Category Name</label>
                                            <input type="text" id="category_name" name="category_name"
                                                   value="{{ $category->category_name }}"
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
                                                        value="{{ $status->status_id }}" {{ $category->category_status == $status->status_id?'selected':'' }}>{{ $status->name }}</option>
                                                @empty
                                                    <option value="">No status found</option>
                                                @endforelse
                                            </select>
                                            <small class="form-control-feedback"> Select your category </small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group @error('description') has-danger @enderror">
                                            <label class="control-label">Category Description</label>
                                            <textarea class="form-control @error('description') form-control-danger @enderror" name="description" id="description" cols="30" rows="3">{{ $category->description }}</textarea>
                                            @error('description')
                                            <small class="form-control-feedback"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group @error('image') has-danger @enderror">
                                            <label class="control-label">Category Logo</label>
                                            <input type="file" name="image" id="image" class="dropify" data-default-file="{{ asset('images/'.$category->image) }}">
                                            <input type="hidden" name="oldImage" value="{{ $category->image }}">
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
    </div>

    <!-- End PAge Content -->
@endsection
