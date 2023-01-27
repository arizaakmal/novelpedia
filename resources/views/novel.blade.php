@extends('layouts.main')

@section('content')
    {{-- Make novel content --}}


    <div class="container">
        <div class="row">
            <h2>{{ $novel->title }}</h2>
        </div>
        <div class="row">

            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/1200x1200?animation" class="card-img-top" alt="Martial God Asura">
            </div>

            <div class="col-md-6 float-start">
                <h3><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i
                        class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1 "></i><i
                        class="bi bi-star-half me-1"></i> 4.5</h3>
                <p>Genre: @foreach ($novel->genre as $genre)
                        <a href="/genre/{{ $genre->slug }}"
                            class="text-decoration-none text-black">{{ $genre->name }}</a>,
                    @endforeach
                </p>
                <p>Author: <a href="/author/{{ $novel->author->slug }}"
                        class="text-decoration-none text-black">{{ $novel->author->name }}</a> </p>
                <p>Description: </p>
                <p>{{ $novel->description }}</p>
                <button class="btn
                        btn-info text-white"> Start Reading</button>
            </div>
        </div>
    </div>
    <section class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-8 col-md-10 ">
                <h3 class="fw-light">List Chapter</h3>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        Chapter 1
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Chapter 2</a>
                    <a href="#" class="list-group-item list-group-item-action">Chapter 3</a>
                    <a href="#" class="list-group-item list-group-item-action">Chapter 4</a>
                    <a class="list-group-item list-group-item-action disabled">Chapter 5</a>
                </div>
                {{-- <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
                    etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p> --}}
            </div>
        </div>
    </section>
    <div class="album pt-5 bg-light">
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
