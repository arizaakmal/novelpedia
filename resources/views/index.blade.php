@extends('layouts.main')

@section('content')


    <div class="container">
        @if ($active == 'home')
            <div class="row mb-5">
                <div class="col-6">
                    <div id="carouselExampleAutoplaying" class="carousel slide w-100" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/iklan-burger.jpg') }}" class="img-fluid img-iklan  shadow-md "
                                    alt="iklan">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/iklan-indomie.png') }}" class="img-fluid img-iklan  shadow-md "
                                    alt="iklan">
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
                    <img src="{{ asset('img/pocari.jpg') }}" class="img-fluid img-iklan pocari shadow-md w-100 "
                        alt="iklan">
                </div>
                <div class="col-3">
                    <img src="{{ asset('img/sepeda.jpg') }}" class="img-fluid img-iklan sepeda shadow-md w-100 "
                        alt="iklan">
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
        @endif

        @if ($active == 'cari')
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-start">
                        <div class="line me-2"></div>
                        <h2 class="text-center">Hasil Pencarian</h2>
                    </div>
                </div>
            </div>
        @endif

        {{-- <h2 class="">{{ $title }}</h2> --}}

        <div class="row">
            @foreach ($novels as $novel)
                <div class="col-md-2">
                    <div class="card my-3 h-100">
                        @if ($novel->cover)
                            <img src="{{ asset('storage/covers/' . $novel->cover) }}" class="card-img-top position-relative"
                                alt="{{ $novel->title }}">
                        @else
                            <img src="https://source.unsplash.com/1200x1200?animation"
                                class="card-img-top position-relative" alt="{{ $novel->title }}">
                        @endif
                        <div class="rating bg-opacity-75 position-absolute top-0 start-0 p-1 bg-secondary text-white ">
                            <i class="fa-solid fa-star" style="color: #eeff00;"></i> 4.5
                        </div>

                        <div class="card-body p-2">
                            <h6 class=""><a href="/novel/{{ $novel->slug }}"
                                    class="text-decoration-none text-dark card-title">
                                    @if (strlen(strip_tags($novel->title)) <= 30)
                                        {{ strip_tags($novel->title) }}
                                    @else
                                        {{ substr(strip_tags($novel->title), 0, 30) }}...
                                    @endif
                                </a>
                            </h6>
                            <p class="card-text ">{{ $novel->author->name }}</p>
                            <p><i class="fa-solid fa-eye mt-2" style="color: #000000;"></i> 10.5K</p>
                            <p><i class="fa-solid fa-bars mt-2" style="color: #000000;"></i> 215 Page</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if ($active == 'cari')
    @else
        <div class="container mt-5">
            <h2>Tes Novel</h2>
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
                                <p class="card-text">{{ substr(strip_tags($novel->description), 0, 50) }}...</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
