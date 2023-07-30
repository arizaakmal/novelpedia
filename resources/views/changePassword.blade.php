@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="text-center">{{ $title }}</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show " role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('changePassword') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control @error('currentPassword') is-invalid @enderror"
                            id="currentPassword" name="currentPassword" required autocomplete="currentPassword">
                        @error('currentPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" required autocomplete="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" required
                            autocomplete="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
