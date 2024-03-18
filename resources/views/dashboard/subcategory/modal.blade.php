<div class="modal fade" id="modal-subcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Tambah Subategory</h1>
                    <form action="/dashboard/subcategory" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Nama Category</label>
                            <select class="form-select" name="category_id" >
                                @foreach ($categories as $category)
                                    @if (old('category_id') == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->nama_kategori }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama_subkategori">Nama Subcategory</label>
                            <input type="text" class="form-control @error('nama_subkategori') is-invalid @enderror" name="nama_subkategori" id="nama_subkategori" required autofocus value="{{ old('nama_subkategori') }}">
                            @error('nama_subkategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="" cols="5" rows="5" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
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

                    <button class="w-100 btn btn-lg btn-primary mt-5 dftr" type="submit">Tambah</button>
                    </form>

                </main>
                </div>
            </div>
            
        </div>
    </div>
</div>