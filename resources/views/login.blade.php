@section('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@extends('layouts.main')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- if withErrors email --}}
    @if ($errors->has('email'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first('email') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <main class="form-signin w-50  m-auto">
        <h1 class="title text-center">Novelpedia</h1>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <h1 class="h3 mb-3  text-center mt-2">Log In</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control shadow-sm @error('email') is-invalid @enderror" id="email"
                    placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control shadow-sm @error('password') is-invalid @enderror" id="password"
                    placeholder="Password" name="password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small class="d-block text-end mt-1">Forgot Password?</small>
            </div>


            <div class="checkbox mt-2 mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">LOGIN</button>
        </form>
        <small class="d-block text-center mt-2">Doesnt have account? <a href="/signUp">Sign Up</a> </small>
    </main>
@endsection
