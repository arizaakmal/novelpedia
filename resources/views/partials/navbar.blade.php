{{-- Navbar --}}
<nav class="navbar navbar-expand-lg text-bg-info">
    <div class="container-fluid ms-5">
        <a class="navbar-brand " href="/">Novelpedia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'rangking' ? 'active' : '' }}" aria-current="page"
                        href="/rangking">Ranking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'hot' ? 'active' : '' }}" href="/hot">Hot Novel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'genre' ? 'active' : '' }}" href="/genre">Genre</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/genre" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Genre
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($genres as $genre)
                            <li><a class="dropdown-item" href="/genre/{{ $genre->slug }}">{{ $genre->name }}</a></li>
                        @endforeach
                        {{-- <li><a class="dropdown-item" href="/genre/action">Action</a></li>
                        <li><a class="dropdown-item" href="/genre/adventure">Adventure</a></li>
                        <li><a class="dropdown-item" href="/genre/romance">Romance</a></li>
                        <li><a class="dropdown-item" href="/genre/slice-of-life">Slice of Life</a></li> --}}
            </ul>

            <form class=" d-flex " role="search" action="/cari" method="GET">
                <input class="form-control me-2" type="search" name="keywords" placeholder="Cari Novel"
                    aria-label="Search">
                {{-- <button class="btn btn-outline-primary " type="submit">Search</button> --}}
            </form>
            @if (Auth::check())
                <ul class="navbar-nav me-1 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log
                                    out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <form action="" class=" d-flex">
                    <button class=" btn btn-success"><a class="nav-link" href="/login">Sign In</a></button>
                    {{-- <button class=" btn btn-primary ms-2  "><a class="nav-link" href="/signUp">Sign Up</a></button> --}}
                </form>
            @endif



            {{-- <button class="btn btn-success ms-3" type="submit">Login</button>
            <button class="btn btn-primary ms-3" type="submit">Sign Up</button> --}}

        </div>
    </div>
</nav>
