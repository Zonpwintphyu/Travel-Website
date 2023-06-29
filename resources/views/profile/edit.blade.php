<!-- resources/views/profile/edit.blade.php -->

@extends('master')

@section('content')
    <h3 class="text-center">Edit Profile</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-4 col-md-4 bg-white rounded ">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="my-2">Name</label>
                <input id="name" type="text" class="form-control mb-3" name="name" value="{{ $user->name }}"
                    required autofocus>
            </div>

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control mb-3" name="email" value="{{ $user->email }}"
                    required>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input id="password" type="password" class="form-control mb-3" name="password" autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input id="password_confirmation" type="password" class="form-control mb-3" name="password_confirmation"
                    autocomplete="new-password">
            </div>

            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-outline-dark my-3 fw-bold">Update Password</button>
        </form>
    </div>
@endsection
