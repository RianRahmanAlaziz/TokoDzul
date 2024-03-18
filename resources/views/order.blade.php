@extends('layouts.main')
@section('container')
        <!-- Page Title -->
        <section class="page-title text-center bg-light">
            <div class="container relative clearfix">
              <div class="title-holder">
                <div class="title-text">
                  <h1 class="uppercase">Order</h1>
                  <ol class="breadcrumb">
                    <li>
                      <a href="/">Home</a>
                    </li>
                    <li>
                      <a href="/shop">Shop</a>
                    </li>
                    <li class="active">
                      Order
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </section>

        <section class="section-wrap checkout pb-70">
            <div class="container relative">
              <div class="row">
    
                <div class="ecommerce col-xs-12">
                    <h2>My Order</h2>
                    <table class="table table-ordered table-hover table-striped">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Grand Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                <td>@rupiah($order->grand_total)</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <form action="/pesanan/ubah_status/{{ $order->id }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="text" name="status" id="status" hidden value="Selesai">
                                        <button  class="btn btn-success  border-0">Diterima</button>
                                        </form>
                                </td>
                            @endforeach
                        </tbody>
                    </table>

                    <h2>My Payment</h2>
                    <table class="table table-ordered table-hover table-striped">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nominal Transfer</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->created_at->format('d-M-Y') }}</td>
                                <td>@rupiah($payment->jumlah)</td>
                                <td>{{ $payment->status }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </section>
@endsection