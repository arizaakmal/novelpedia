@extends('layouts.main')

@section('content')
    {{-- Make novel content --}}


    <div class="container">
        <div class="row mb-5">
            <div class="col-6">
                <div id="carouselExampleAutoplaying" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/iklan-burger.jpg') }}" class="img-fluid  shadow-md " alt="iklan">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/iklan-indomie.png') }}" class="img-fluid  shadow-md " alt="iklan">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-3">
                <img src="{{ asset('img/pocari.jpg') }}" class="img-fluid pocari shadow-md w-100 " alt="iklan">
            </div>
            <div class="col-3">
                <img src="{{ asset('img/sepeda.jpg') }}" class="img-fluid sepeda shadow-md w-100 " alt="iklan">
            </div>
        </div>
        {{-- Buat garis vertikal di sebelah kiri h2 --}}
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-start">
                    <div class="line me-2"></div>
                    <h2 class="text-center">Hot Novel</h2>
                </div>
            </div>
        </div>
        {{-- <h2 class="">{{ $title }}</h2> --}}
        <div class="row">
            @foreach ($novels as $novel)
                <div class="col-md-3">
                    <div class="card my-3" style="width: 18rem;">
                        <img src="https://source.unsplash.com/1200x1200?animation" class="card-img-top"
                            alt="{{ $novel->title }}">
                        <div class="card-body">
                            <h5> <a href="/novel/{{ $novel->slug }}" class="text-decoration-none">{{ $novel->title }}</a>
                            </h5>
                            <p class="card-text">{{ $novel->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($active == 'cari')
            @else
                <div class="d-flex justify-content-center">
                    {{ $novels->links() }}
                </div>
            @endif
        </div>
    </div>

    @if ($active == 'cari')
    @else
        <div class="container mt-5">
            <h2>Hot Novel</h2>
            <div class="row">
                @foreach ($novels as $novel)
                    <div class="col-md-3">
                        <div class="card my-3" style="width: 18rem;">
                            <img src="https://source.unsplash.com/1200x1200?animation" class="card-img-top"
                                alt="{{ $novel->title }}">
                            <div class="card-body">
                                <h5> <a href="/novel/{{ $novel->slug }}"
                                        class="text-decoration-none">{{ $novel->title }}</a>
                                </h5>
                                <p class="card-text">{{ $novel->excerpt }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
