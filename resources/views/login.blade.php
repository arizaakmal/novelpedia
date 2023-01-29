@extends('layouts.main')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <main class="form-signin w-25  m-auto">
        <form method="POST" name="login" action="{{ route('login.submit') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center mt-5">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    placeholder="Password" name="password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
        <small class="d-block text-center mt-1">Doesnt have account? <a href="/signUp">Sign Up</a> </small>
    </main>
@endsection
