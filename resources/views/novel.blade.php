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
        <div class="row">
            <h2>{{ $novel->title }}</h2>
        </div>
        <div class="row">

            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/covers/' . $novel->cover) }}" class="" alt="{{ $novel->title }}">
            </div>
            <div class="col-md-6 float-start">
                <h3><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i
                        class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1 "></i><i
                        class="bi bi-star-half me-1"></i> 4.5</h3>
                @php
                    $genreNames = $novel->genres->pluck('name')->implode(', ');
                @endphp

                <p>Genre: {{ $genreNames }}</p>
                <p>Author: <a href="/author/{{ $novel->author->slug }}"
                        class="text-decoration-none text-black">{{ $novel->author->name }}</a> </p>
                <p>Description: </p>

                <p id="description" class="description-collapsed">
                    {{ Str::limit($novel->description, 200, '...') }}
                </p>

                <a href="#" id="show-more" onclick="toggleDescription()" style="cursor: pointer"
                    data-limited-description="{{ Str::limit($novel->description, 200, '...') }}"
                    data-full-description="{{ $novel->description }}">Show More</a>

                <a href="https://shopee.co.id/search?keyword={{ $novel->title }} {{ $novel->author->name }}"
                    target="_blank" class="btn text-white fs-4 p-3 shadow d-block mb-3"
                    style="background-color: #f94c30;"><i class="fa-solid fa-cart-shopping " style="color: #ffffff;"></i>
                    Buy on Shopee </a>
                {{-- <a href="https://shopee.co.id/search?keyword={{ $novel->title }} {{ $novel->author->name }}"
                    target="_blank" class="btn text-white fs-4 p-3 shadow d-block" style="background-color: #0060af;"><img
                        src="{{ asset('img/gramedia.png') }}" alt=""> Buy on Gramedia </a> --}}
            </div>
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
@endsection
