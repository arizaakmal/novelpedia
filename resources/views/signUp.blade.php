@section('styles')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection

@extends('auth.main')

@section('content')
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-lg-6">
                <main class="form-signin  m-auto">
                    <h1 class="title text-center"><a href="{{ route('home') }}">Novelpedia</a></h1>
                    <form method="POST" name="signUp" action="/signUp">
                        @csrf
                        <h1 class="h3 mb-3  text-center mt-2">Please sign up</h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-sm @error('name') is-invalid @enderror"
                                id="name" placeholder="Name" name="name" required value="{{ old('name') }}">
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-sm @error('username') is-invalid @enderror"
                                id="username" placeholder="Username" name="username" required
                                value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control shadow-sm @error('email') is-invalid @enderror"
                                id="email" placeholder="name@example.com" name="email" required
                                value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control shadow-sm @error('password') is-invalid @enderror"
                                id="password" placeholder="Password" name="password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign Up</button>
                    </form>
                    <small class="d-block text-center mt-1">Have account? <a href="/login">Login</a> </small>
                </main>
            </div>
        </div>
    </div>
@endsection
