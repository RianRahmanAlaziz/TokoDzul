@extends('dashboard.layouts.main')
@section('container')
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">
                    Laporan Pesanan
                </h4>
            </div>

            <div class="card-body">
                @if (session()->has('success'))
                <div class="row justify-content-start ps-3">
                    <div class="col-md-4 alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                
                    <div class="row">
                        <div class="col-md-6">
                            <form>
                                <div class="form-group">
                                    <label for="dari">Dari</label>
                                    <input type="date" name="dari" id="dari" class="form-control" value="{{ request()->input('dari') }}">
                                </div>
                                <div class="form-group">
                                    <label for="sampai">Sampai</label>
                                    <input type="date" name="sampai" id="sampai" class="form-control" value="{{ request()->input('sampai') }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
            @if (request()->input('dari'))
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah Dibeli</th>
                            <th>Total Qty</th>
                            <th>Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            @endif
            </div>
        </div>  
        
@endsection

@push('js')
    <script>
        $(function(){

            const dari = '{{ request()->input('dari') }}'
            const sampai = '{{ request()->input('sampai') }}'

            function rupiah(angka){
                const format = angka.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                return 'Rp ' + convert.join('.').split('').reverse().join('');
            }


        $.ajax({
            url: `/api/reports?dari=${dari}&sampai=${sampai}`,
        success: function({data}){
                let row;
                data.map(function(val, index){
                    row += `<tr>
                                <td> ${index+1} </td>
                                <td> ${val.nama_produk} </td>
                                <td> ${rupiah(val.harga)} </td>
                                <td> ${val.jumlah_dibeli} </td>
                                <td> ${val.total_qty} </td>
                                <td> ${rupiah(val.pendapatan)} </td>
                                
                            </tr>`
                });

                $('tbody').append(row)
            }
        })


        });
    </script>
@endpush



