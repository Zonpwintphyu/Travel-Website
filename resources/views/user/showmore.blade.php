@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9 offset-2 mt-3">
                <div class="my-3">
                    <a href="{{ route('post#show') }}" class="text-decoration-none text-black">
                        <i class="fa-regular fa-circle-left"></i> back
                    </a>
                </div>
                <div>
                    <h3 class="text-center">{{ $post['title'] }}</h3>
                    <p class="shadow border p-3">
                        {{ $post['description'] }}
                    </p>

                    <div class="">
                        @if ($post->image == null)
                            <img src="{{ asset('404.jpg') }}" class="img-thumbnail my-4 shadow-sm">
                        @else
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail my-4 shadow-sm">
                        @endif
                    </div>

                    <small><i class="fa-solid fa-money-check-dollar text-primary"></i> {{ $post->price }}$ /</small>

                    <small><i class="fa-solid fa-city text-danger"></i> {{ $post->address }} /</small>

                    <small><i class="fa-solid fa-star text-warning"></i> {{ $post->rating }}</small>
                    <div class="d-flex">
                        <div class="m-3 btn btn-dark "> <i class="fa-solid fa-calendar-days"></i>
                            {{ $post['created_at']->format('d-F-Y') }}</div>

                        <div class="m-3 btn btn-dark "> <i class="fa-solid fa-stopwatch"></i>
                            {{ $post['created_at']->format('n:i:s a') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
