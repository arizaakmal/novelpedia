@section('styles')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <h1>{{ $title }}</h1>
            <div class="col-sm-3">
                <!-- Profile picture -->
                {{-- <img src="{{ asset($user->profile_picture) }}" class="img-fluid rounded-circle w-75" alt="Profile Picture"> --}}
                {{-- <div class="profile-placeholder">{{ substr(Auth::user()->name, 0, 1) }}</div> --}}
                <div class="circle mt-3">
                    <span class="initial">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
            </div>
            <div class="col-sm-9">
                <!-- User information -->
                <fieldset disabled="disabled">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" class="form-control w-50" placeholder="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" class="form-control w-50" placeholder="{{ $user->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Email:</label>
                        <input type="text" id="username" class="form-control w-50" placeholder="{{ $user->email }}">
                    </div>
                </fieldset>
                <a href="{{ route('changePasswordForm') }}" class="btn btn-primary mt-3">Change Password</a>
            </div>
        </div>
    </div>
@endsection
