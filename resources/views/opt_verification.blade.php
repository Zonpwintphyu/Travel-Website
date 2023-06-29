@extends('master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="mt-5 test-center test-warning mb-5">
                    Email Verification
                </h3>
                @if (session('activated'))
                    <div class="alert alert-success" role="alert">
                        {{ session('activated') }}
                    </div>
                @endif

                <form action="{{ route('verifyotp') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="token">Enter OTP</label>
                        <input type="number" name="token" class="form-control" placeholder="Enter token">
                        <div name="token" class="invalid-feedback">
                            Please provide a valid OTP.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-dark float-end mt-3">Enter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
