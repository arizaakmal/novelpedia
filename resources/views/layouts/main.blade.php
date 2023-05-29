@include('partials.head')

<body>
    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Javascript --}}
    @include('partials.script')
</body>

</html>
