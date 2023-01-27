@extends('layouts.main')

@section('content')
    {{-- Make novel content --}}


    <div class="container">
        <h2>Daftar Genre</h2>
        <ul class="list-group list-group-flush">
            @foreach ($genres as $genre)
                <li class="list-group-item"><a href="/?genre={{ $genre->slug }}">{{ $genre->name }}</a></li>
            @endforeach
            {{-- <li class="list-group-item"><a href="">Martial God Asura</a></li>
            <li class="list-group-item"><a href="">Reincarnation of Strongest Sword God</a></li>
            <li class="list-group-item"><a href="">Overgeared</a></li>
            <li class="list-group-item"><a href="">Emperor's Domination</a></li> --}}
        </ul>
    </div>
@endsection
