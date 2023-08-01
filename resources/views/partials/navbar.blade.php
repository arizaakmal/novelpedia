{{-- Navbar --}}
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid ms-5">
        <a class="navbar-brand" href="/">Novelpedia</a>
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
            </ul>

            <form class=" d-flex " role="search" action="/cari" method="GET">
                <div class="search-box me-2">
                    <input class="form-control " type="search" name="keywords" placeholder="Search Novel"
                        aria-label="Search">
                    <button class="fa fa-search btn btn-unstyled px-1" type="submit"></button>
                </div>
                {{-- <button class="btn btn-outline-primary " type="submit">Search</button> --}}
            </form>
            @if (Auth::check())
                <ul class="navbar-nav me-1 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome, {{ explode(' ', Auth::user()->name)[0] }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            </li>
                            @if (Auth::user()->isAdmin())
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
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
                    <a class="btn btn-success btn-login" href="/login">Log
                        In</a>
                </form>
            @endif
        </div>
    </div>
</nav>
