@section('styles')
    <link rel="stylesheet" href="{{ asset('css/package/splide.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/package/splide.min.js') }}"></script>
    <script>
        new Splide('.splide', {
            type: 'loop',
            padding: '75px',
            perPage: 3,
            perMove: 1,
            autoplay: true,
            lazyLoad: 'nearby',
            interval: 3000,
            breakpoints: {
                992: {
                    perPage: 2,
                },
                768: {
                    perPage: 1,
                },
            }
        }).mount();
    </script>
@endsection

@extends('layouts.main')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-5">
        @if ($active == 'home')
            <div class="row mb-5">
                <div class="col-6">
                    <div id="carouselExampleAutoplaying" class="carousel slide w-100" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <a href="https://mcdonalds.co.id/" target="_blank">
                                <div class="carousel-item active img card">
                                    {{-- <img src="{{ asset('img/iklan-burger.jpg') }}" class="img-fluid img-iklan" alt="iklan"> --}}

                                    <img src="{{ asset('img/iklan-burger.jpg') }}" class="img-fluid img-iklan"
                                        alt="iklan">

                                </div>
                            </a>
                            <a href="https://www.indomie.com/" target="_blank">
                                <div class="carousel-item img card">
                                    <img src="{{ asset('img/iklan-indomie.png') }}" class="img-fluid img-iklan"
                                        alt="iklan">
                                </div>
                            </a>
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
                    <a href="https://www.pocarisweat.id/" target="_blank">
                        <div class="img cover-img">
                            <img src="{{ asset('img/pocari.jpg') }}" class="img-fluid img-iklan pocari w-100 "
                                alt="iklan">
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="https://www.tokopedia.com/idachiofficial/alat-fitness-sepeda-statis-elektrik-idachi-upright-bike-id-01b?extParam=ivf%3Dfalse%26src%3Dsearch"
                        target="_blank">
                        <div class="img cover-img">
                            <img src="{{ asset('img/sepeda.jpg') }}" class="img-fluid img-iklan sepeda w-100 "
                                alt="iklan">
                        </div>
                    </a>
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
                    <div class="card my-3 h-100 shadow-sm">
                        <div class="img">
                            <a href="/novel/{{ $novel->slug }}">
                                @if ($novel->cover)
                                    <img src="{{ asset('storage/covers/' . $novel->cover) }}"
                                        class="card-img-top position-relative" alt="{{ $novel->title }}">
                                @else
                                    <img src="https://source.unsplash.com/1200x1200?animation"
                                        class="card-img-top position-relative" alt="{{ $novel->title }}">
                                @endif
                            </a>
                        </div>
                        <div
                            class="rating bg-opacity-75 position-absolute top-0 start-0  bg-secondary text-white text-center">
                            <i class="fa-solid fa-star" style="color: #eeff00;"></i>
                            {{ $novel->rating == floor($novel->rating) ? floor($novel->rating) : $novel->rating }}
                        </div>

                        <div class="card-body p-2">
                            <h6 class="text-decoration-none-hover"><a href="/novel/{{ $novel->slug }}"
                                    class="text-decoration-none text-dark card-title">
                                    @if (strlen(strip_tags($novel->title)) <= 30)
                                        {{ strip_tags($novel->title) }}
                                    @else
                                        {{ substr(strip_tags($novel->title), 0, 30) }}...
                                    @endif
                                </a>
                            </h6>
                            <p class="card-text ">{{ $novel->author->name }}</p>
                            <p><i class="fa-solid fa-eye mt-2" style="color: #000000;"></i>
                                @if ($novel->views >= 1000000000)
                                    {{ round($novel->views / 1000000000, 1) }}B
                                @elseif ($novel->views >= 1000000)
                                    {{ round($novel->views / 1000000, 1) }}M
                                @elseif ($novel->views >= 1000)
                                    {{ round($novel->views / 1000, 1) }}K
                                @else
                                    {{ $novel->views }}
                                @endif
                            </p>
                            <p><i class="fa-solid fa-bars mt-2" style="color: #000000;"></i> {{ $novel->pages }} Pages</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if ($active != 'cari')
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-start">
                        <div class="line me-2"></div>
                        <h2 class="text-center">Popular Genres</h2>
                    </div>
                </div>
            </div>
            <div class="splide mt-3" role="group" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($genres as $genre)
                            <li class="splide__slide">
                                <div class="card card-genre bg-gradient-radial rounded-lg border-none mb-5"
                                    style="width: 300px;">
                                    <div class="card-body card-body-genre w-100 text-center">
                                        <h5 class="card-title text-white mb-3">{{ $genre->name }}</h5>
                                        <img src="{{ asset('storage/covers/' . $novels[0]->cover) }}"
                                            class="card-img card-img-genre mb-3 shadow-lg" alt="{{ $novels[0]->title }}"
                                            style="width: 120px">
                                        <h6 class="card-subtitle mb-2">{{ $novels[0]->title }}</h6>
                                        <p class="card-description">
                                            @if (strlen(strip_tags($novels[0]->description)) <= 80)
                                                {{ strip_tags($novels[0]->description) }}
                                            @else
                                                {{ substr(strip_tags($novels[0]->description), 0, 80) }}...
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row mt-3">
                @foreach ($genres as $genre)
                    <div class="col-md-4">
                        <div class="card card-genre bg-gradient-radial rounded-lg border-none mb-5" style="width: 300px;">
                            <div class="card-body card-body-genre w-100 text-center">
                                <h5 class="card-title text-white mb-3">{{ $genre->name }}</h5>
                                <img src="{{ asset('storage/covers/' . $novels[0]->cover) }}"
                                    class="card-img card-img-genre mb-3" alt="{{ $novels[0]->title }}"
                                    style="width: 120px">
                                <h6 class="card-subtitle mb-2">{{ $novels[0]->title }}</h6>
                                <p class="card-description">
                                    @if (strlen(strip_tags($novels[0]->description)) <= 80)
                                        {{ strip_tags($novels[0]->description) }}
                                    @else
                                        {{ substr(strip_tags($novels[0]->description), 0, 80) }}...
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-start">
                        <div class="line me-2"></div>
                        <h2 class="text-center">Top Novel</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
