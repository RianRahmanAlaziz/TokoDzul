@foreach ($payments as $payment)
<div class="modal fade" id="modal-payment-edit-{{ $payment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Form Pembayaran</h1>
                    <form action="/dashboard/payment/{{ $payment->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="created_at">Tanggal</label>
                            <input type="text" class="form-control" name="created_at" id="created_at" required readonly value="{{ $payment->created_at->format('d-M-Y') }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="jumlah" required readonly value="@rupiah($payment->jumlah)">
                        </div>
                        <div class="form-group">
                            <label for="no_rekening">No Rekening</label>
                            <input type="text" class="form-control" name="no_rekening" id="no_rekening" required readonly value="{{ $payment->no_rekening }}">
                        </div>
                        <div class="form-group">
                            <label for="atas_nama">Atas Nama</label>
                            <input type="text" class="form-control" name="atas_nama" id="atas_nama" required readonly value="{{ $payment->atas_nama}}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select"  name="status" id="status">
                                <option value="MENUNGGU" {{ $payment->status == 'MENUNGGU' ? 'selected' : '' }}>MENUNGGU</option>
                                <option value="DITERIMA" {{ $payment->status == 'DITERIMA' ? 'selected' : '' }}>DITERIMA</option>
                                <option value="DITOLAK" {{ $payment->status == 'DITOLAK' ? 'selected' : '' }}>DITOLAK</option>
                            </select>
                        </div>

                    <button class="w-100 btn btn-lg btn-primary mt-5 dftr" type="submit">Simpan</button>
                    </form>

                </main>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endforeach

