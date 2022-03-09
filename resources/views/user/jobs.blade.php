@extends('user.layouts.main')

@section('title')
{{ $title }}
@endsection

@section('content')
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 align-items-center">
                            <h4 class="card-title">Micro Jobs</h4>
                            <h6 class="card-subtitle">All micro jobs</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn text-white btn-primary" href="{{ route('microjob.create') }}"><i
                                    class="mdi mdi-library-plus"></i> Add Job</a>
                        </div>
                        <div class="col-8 text-center">
                            @include('user.layouts.error')
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Job Duration</th>
                                <th>Budget</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($jobs as $job)
                                <tr>
                                    <td>{{ $job->job_title }}</td>
                                    <td>{{ $job->slug }}</td>
                                    <td width="400px">{{ $job->description }}</td>
                                    <td><img width="100px" src="{{ asset('images/'.$job->image) }}" alt="{{ $job->job_title }}"></td>
                                    <td>{{ $job->getCategory->category_name }}</td>
                                    <td>
                                        {{ showStatus($job->status) }}
                                    </td>
                                    <td>{{ $job->job_duration }}</td>
                                    <td>{{ $job->budget }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('microjob.show',$job->job_id) }}"
                                           class="btn text-white btn-primary mr-3"><i class="mdi mdi-eye"></i></a>
                                        <a href="{{ route('microjob.edit',$job->job_id) }}"
                                           class="btn text-white btn-primary mr-3"><i class="mdi mdi-pen"></i></a>
                                        <form method="post"
                                              action="{{ route('microjob.destroy',$job->job_id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-white btn-danger"><i
                                                    class="mdi mdi-delete"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End PAge Content -->
@endsection
