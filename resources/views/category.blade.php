@extends('layouts.main')

@section('container')

<h1 class="mb-5">Category : {{ $category }}</h1>

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <a href="/belanja/{{ $post->slug }}" class="c">
                    <img src="../img/bery.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title fs-5">{{ $post->title }}</h3>
                        <h4 class="card-title fs-6">{{ $post->harga }}</h4>
                    </div>
                </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>

@endsection