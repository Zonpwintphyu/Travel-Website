@extends('master')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body ">
                        <h2 class="card-title text-center">Login</h2>
                        <form method="POST" action="/login">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email"
                                    value="{{ old('email') }}" name="email" required>
                                <x-error error="email" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password"
                                    value="{{ old('password') }}" name="password" required>
                                <x-error error="password" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <p>If you haven't logged in before, click <a href="/register">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
