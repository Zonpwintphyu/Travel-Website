@extends('master')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Registration Form</h2>
                        <form method="POST" action="/register">
                            @csrf
                            <div class="form-group">
                                <label for="role" class="form-label">Role:</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" value="{{ old('name') }}" required>
                                <x-error error="name" />
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" required>
                                <x-error error="email" />
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password"
                                    name="password" value="{{ old('password') }}" required>
                                <x-error error="password" />
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                                    placeholder="Confirm your password" required>
                                <x-error error="confirm-password" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark mt-3">Register</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <p>If you have logged in before, click <a href="/login">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
