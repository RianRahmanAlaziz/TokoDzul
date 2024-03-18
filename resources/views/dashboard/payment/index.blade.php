@extends('dashboard.layouts.main')
@section('container')
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pembayaran
                </h4>
            </div>

            <div class="card-body">
                @if (session()->has('success'))
                <div class="row justify-content-start ">
                    <div class="col-md-4 alert alert-success alert-dismissible fade show " role="alert">
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
                            <th>Tanggal</th>
                            <th>Order</th>
                            <th>Jumlah</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payment->created_at->format('d-M-Y') }}</td>
                                    <td>{{ $payment->order_id }}</td>
                                    <td>@rupiah($payment->jumlah)</td>
                                    <td>{{ $payment->no_rekening }}</td>
                                    <td>{{ $payment->atas_nama }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-payment-edit-{{ $payment->id }}">Edit</button>

                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>  
        
@endsection
@include('dashboard.payment.modal')




