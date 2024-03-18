@extends('dashboard.layouts.main')
@section('container')
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pesanan Selesai
                </h4>
            </div>

            <div class="card-body">
                @if (session()->has('success'))
                <div class="row justify-content-start ps-3">
                    <div class="col-md-5 alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
 
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pesanan</th>
                                <th>Invoice</th>
                                <th>Pembeli</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                <td>{{ $order->invoice }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>@rupiah($order->grand_total)</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
        
@endsection




