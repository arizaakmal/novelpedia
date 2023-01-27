@extends('layouts.main')

@section('content')
    <main class="form-signin w-25 m-auto">
        <form method="POST" name="signUp" action="/signUp">
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center mt-5">Please sign up</h1>
            <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name"
                    name="name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    placeholder="Username" name="username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="name@example.com" name="email" required value="{{ old('email') }}">
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


            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign Up</button>
        </form>
        <small class="d-block text-center mt-1">Have account? <a href="/login">Login</a> </small>
    </main>
@endsection
