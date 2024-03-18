@foreach ($products as $product)
<div class="modal fade" id="modal-product-edit-{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Edit Product</h1>
                    <form action="/dashboard/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama_produk">Nama Product</label>
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" id="nama_produk" required autofocus value="{{ old('nama_produk', $product->nama_produk) }}">
                            @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-select" name="category_id" >
                                @foreach ($categories as $category)
                                    @if (old('category_id', $product->category_id) == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->nama_kategori }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" required autofocus value="{{ old('harga', $product->harga) }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="diskon">Diskon</label>
                            <input type="number" class="form-control @error('diskon') is-invalid @enderror" name="diskon" id="diskon" required autofocus value="{{ old('diskon',$product->diskon) }}">
                            @error('diskon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok" required autofocus value="{{ old('stok',$product->stok) }}">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="" cols="5" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control  @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

