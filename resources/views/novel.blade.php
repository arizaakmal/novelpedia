@section('styles')
    <link rel="stylesheet" href="{{ asset('css/novel.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/novel.js') }}"></script>
@endsection

@extends('layouts.main')

@section('content')
    {{-- Make novel content --}}


    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $novel->title }}</li>
            </ol>
        </nav>
        <div class="row">
            <h2>{{ $novel->title }}</h2>
        </div>
        <div class="row mt-2">
            <div class="col-md-3 text-center">
                <img src="{{ asset('storage/covers/' . $novel->cover) }}" class="w-100 mx-auto mb-3 shadow"
                    alt="{{ $novel->title }}">
                <p><i class="fa-solid fa-bookmark" style="color: #000000;"></i> Add to bookmark</p>
                @foreach ($novel->genres as $genre)
                    <a href="#" class="badge text-bg-dark text-decoration-none">{{ $genre->name }}</a>
                @endforeach
                <p class="my-3 "><i class="fa-solid fa-eye mt-2" style="color: #000000;"></i>
                    @if ($novel->views >= 1000000000)
                        {{ round($novel->views / 1000000000, 1) }}B
                    @elseif ($novel->views >= 1000000)
                        {{ round($novel->views / 1000000, 1) }}M
                    @elseif ($novel->views >= 1000)
                        {{ round($novel->views / 1000, 1) }}K
                    @else
                        {{ $novel->views }}
                    @endif
                    <i class="fa-solid fa-bars ms-3" style="color: #000000;"></i> {{ $novel->pages }} Pages
                </p>

            </div>
            <div class="col-md-6 float-start">
                <h3><i class="fa-solid fa-star" style="color: #eeff00;"></i> {{ $novel->rating }}</h3>

                {{-- <p>Genre: {{ $genreNames }}</p> --}}
                {{-- <p>Author: {{ $novel->author->name }} </p> --}}
                <p class="fw-bolder fs-5">Synopsis</p>

                <p id="description" class="description description-collapsed mb-0"
                    data-full-description="{{ $novel->description }}"
                    data-limited-description="{{ Str::limit($novel->description, 200, '...') }}">
                    {{ Str::limit($novel->description, 200) }}

                </p>
                <div class="toggle_btn d-inline-block">
                    <span class="toggle_text fw-bolder">Show More</span> <span class="arrow">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>
                <p class="fw-bolder fs-5 mt-3">Tags</p>
                @foreach ($novel->tags as $tag)
                    <a href="#" class="btn btn-light rounded-pill text-primary">#{{ strtoupper($tag->name) }}</a>
                @endforeach



                <a href="https://shopee.co.id/search?keyword={{ $novel->title }} {{ $novel->author->name }}"
                    target="_blank" class="btn text-white fs-4 p-3 shadow d-block my-3"
                    style="background-color: #f94c30;"><i class="fa-solid fa-cart-shopping " style="color: #ffffff;"></i>
                    Buy on Shopee </a>
            </div>
            <div class="col-3">
                <p class="fw-bolder fs-5">Related Novels</p>

                @foreach ($novels as $novel)
                    @php
                        $genreNames = $novel->genres->pluck('name')->implode(', ');
                    @endphp
                    <div class="row align-items-center py-2 ">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/covers/' . $novel->cover) }}" class="img-fluid rounded "
                                alt="{{ $novel->title }}">
                        </div>
                        <div class="col-md-8">
                            <p class="mb-0">{{ $novel->title }}</p>
                            <small class="mb-0 text-secondary">{{ $genreNames }}</small>
                            <p class="mb-0 "><i class="fa-solid fa-star" style="color: #eeff00;"></i>
                                {{ $novel->rating }}</p>
                        </div>
                    </div>
                @endforeach




                {{-- <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/covers/' . $novel->cover) }}" class="img-fluid "
                                alt="{{ $novel->title }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="album pt-5 bg-light mt-5">
            <div class="container">
                <div class="row">
                    <h3 class="fw-light">Comments Area</h3>
                    <div class="col-md-8">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
