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
                                <th>User Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>User Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->first_name . " " . $user->last_name}}</td>
                                    <td><img width="100" src="{{ asset('images/'.$user->image) }}" alt="{{ $user->first_name . " " . $user->last_name}}"></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        {{ showStatus($user->status) }}
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <div class="actionDrop">
                                            <a href="#" class="dropdown-toggle u-dropdown btn btn-primary"
                                               data-toggle="dropdown"
                                               role="button" aria-haspopup="true" aria-expanded="true">Action</a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a class="dropdown-item" href="{{ route('user.profile', $user->id) }}"><i
                                                        class="ti-eye"></i> View</a>
                                                <a class="dropdown-item" href="{{ route('admin.user.approve', $user->id) }}"><i
                                                        class="ti-check-box"></i> Approve</a>
                                                <a class="dropdown-item" href="{{ route('admin.user.reject', $user->id) }}"><i
                                                        class="ti-close"></i> Reject</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
