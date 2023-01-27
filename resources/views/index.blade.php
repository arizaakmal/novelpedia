@extends('layouts.main')

@section('content')
    {{-- Make novel content --}}


    <div class="container">

        <h2>{{ $title }}</h2>
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
        </div>
    </div>
    <div class="container mt-5">
        <h2>Hot Novel</h2>
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
        </div>
    </div>
@endsection
