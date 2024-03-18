@extends('dashboard.layouts.main')
@section('container')
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pesanan Dikemas
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
                                <th>Aksi</th>
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
                                <td>
                                    <form action="/pesanan/ubah_status/{{ $order->id }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="text" name="status" id="status" hidden value="Dikirim">
                                        <button  class="btn btn-success  border-0">Dikirim</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
        
@endsection

{{-- @push('js')
    <script>
        $(function(){

            function rupiah(angka){
                const format = angka.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                return 'Rp ' + convert.join('.').split('').reverse().join('');
            }

            function date(date){
                var date = new Date(date);
                var day  = date.getDate();
                var month = date.getMonth();
                var year = date.getFullYear();

                return `${day}-${month}-${year}`
            }

        $.ajax({
            url: '/api/pesanan/dikemas',
        success: function({data}){
                let row;
                data.map(function(val, index){
                    row += `<tr>
                                <td> ${index+1} </td>
                                <td> ${date(val.created_at)} </td>
                                <td> ${val.invoice} </td>
                                <td> ${val.member.nama_member} </td>
                                <td> ${rupiah(val.grand_total)} </td>
                                <td> <a href="" data-id="${val.id}" class="btn btn-success btn-aksi">Dikirim</a></td>
                            </tr>`
                });

                $('tbody').append(row)
            }
        })

        $(document).on('click','.btn-aksi',function(){
            const id = $(this).data('id')

            $.ajax({
                url : '/api/pesanan/ubah_status/' + id,
                type : 'POST',
                data : {
                    status: 'Dikirim'
                },
                success : function(data){
                    location.realod()
                }


            })

        })

        });
    </script>
@endpush --}}



