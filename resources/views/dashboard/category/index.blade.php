@extends('dashboard.layouts.main')
@section('container')
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">
                    Data Category
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
                
                <div class="d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-category">Tambah Data</button>
                    
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Category</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->nama_kategori }}</td>
                                    <td>{{ $category->deskripsi }}</td>
                                    <td><img src="/img/category/{{ $category->gambar }}" width="100" alt=""></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-category-edit-{{ $category->id }}"><i class="bi bi-pencil-square"></i></button>

                                        <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button  class="btn btn-danger  border-0" onclick="return confirm('Yakin ?')"><i class="bi bi-trash"></i></button>
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
@include('dashboard.category.modal')
@include('dashboard.category.edit')




