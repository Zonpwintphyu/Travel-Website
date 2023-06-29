@extends('master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 m-5">
                <div class="card">
                    <div class="card-header">{{ __('Welcome to the Travel Website') }}</div>
                    <div class="card-body">
                        @if (session('activated'))
                            <div class="alert alert-success" role="alert">
                                {{ session('activated') }}
                            </div>
                        @endif

                        <h1>Hello, {{ Auth::user()->name }}!</h1>
                        <p>{{ __("Thank you for being a part of our Travel Website. Enjoy your journey!") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection