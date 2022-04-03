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
                            <h6 class="card-subtitle">All micro jobs</h6>
                        </div>
                    </div>
                    @include('admin.layouts.error')
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Description</th>
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
                                    <td>{{ $job->description }}</td>
                                    <td>{{ $job->getCategory->category_name }}</td>
                                    <td>
                                        {{ showStatus($job->status) }}
                                    </td>
                                    <td>{{ $job->job_duration }}</td>
                                    <td>{{ $job->budget }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="actionDrop">
                                            <a href="#" class="dropdown-toggle u-dropdown btn btn-primary"
                                               data-toggle="dropdown"
                                               role="button" aria-haspopup="true" aria-expanded="true">Action</a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a class="dropdown-item" href="{{ route('admin.microjob.show', $job->job_id) }}"><i
                                                        class="ti-eye"></i> View</a>
                                                <form action="{{ route('admin.job.approve', $job->job_id) }}"
                                                      method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="ti-check-box"></i> Approve
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.job.reject', $job->job_id) }}"
                                                      method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="ti-close"></i> Reject
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
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
