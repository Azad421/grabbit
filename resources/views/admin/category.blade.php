@extends('admin.layouts.main')

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
                            <h4 class="card-title">Data Table</h4>
                            <h6 class="card-subtitle">Data table example</h6>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn text-white btn-primary" href="{{ route('admin.category.create') }}"><i class="mdi mdi-library-plus"></i> Add Category</a>
                        </div>
                    </div>
                    @include('admin.layouts.error')
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_slug }}</td>
                                    <td><a href="{{ route('admin.category.status', $category->category_id) }}">{{ showStatus($category->status) }}</a></td>
                                    <td><img width="100px" src="{{ asset('images/'.$category->image) }}" alt="{{$category->category_name}}"></td>
                                    <td>{{ $category->description }}</td>
                                    <td class="d-flex justify-content-center">

                                        <a href="{{ route('admin.category.edit',$category->category_id) }}" class="btn text-white btn-primary mr-3"><i class="mdi mdi-pen"></i></a>
                                        <form method="post" action="{{ route('admin.category.destroy',$category->category_id) }}">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn text-white btn-danger"><i class="mdi mdi-delete"></i></button>
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
