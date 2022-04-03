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
                            <h4 class="card-title">Data Table</h4>
                            <h6 class="card-subtitle">Data table example</h6>
                        </div>
                    </div>
                    @include('user.layouts.error')
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Order Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->job->job_title }}</td>
                                    <td>{{ showStatus($order->statusInfo) }}</td>
                                    <td>{{ $order->quantity }}</a></td>
                                    <td>{{ $order->amount }}</a></td>
                                    <td>{{ $order->order_note }}</td>
                                    <td class="d-flex justify-content-center">

                                        <a href="{{ route('order.show',$order->id) }}" class="btn text-white btn-primary mr-3"><i class="mdi mdi-eye"></i></a>
                                        <form method="post" action="{{ route('order.destroy',$order->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-white btn-danger"><i class="mdi mdi-delete"></i></button>
                                        </form>
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
