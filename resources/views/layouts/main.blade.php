<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novelpedia | Tempatnya Baca Novel</title>
    {{-- Boostrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    {{-- Boostrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- My CSS --}}
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    {{-- Navbar --}}
    @include('partials.navbar')
    {{-- Content --}}
    @yield('content')
    {{-- Footer --}}
    @include('partials.footer')

    {{-- Boostrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
