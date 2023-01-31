@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="text-center">{{ $title }}</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('changePassword') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
