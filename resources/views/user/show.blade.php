@extends('master')

@section('content')
    <div class="container ">
        <div class="row mt-2">
            <div class="col-12 mb-3">
                <div class="data-input">
                    <div class="row ">
                        <h3 class="mb-3 col-6">
                            Total - {{ $posts->total() }}
                        </h3>

                        <div class="col-6 d-flex">
                            <form action="{{ route('post#createPage') }}" method="get">
                                <div class=" d-flex">
                                    <input type="text" class="form-control mb-3" placeholder="Search your text..."
                                        name="searchKey" value="{{ request('searchKey') }}">
                                    <button class="btn btn-danger mb-3 " type="submit"><i
                                            class="fa-brands fa-searchengin "></i></button>
                                </div>
                            </form>
                        </div>

                    </div>
                    @if (count($posts) != 0)
                        @foreach ($posts as $item)
                            <div class="shadow p-3 ">
                                <div class="row">
                                    <h4 class="col-7">{{ $item['title'] }}</h4>
                                    <h6 class="col-5">{{ $item->created_at->format('d-F') }}</h6>
                                </div>
                                <p class="text-muted">{{ Str::words($item['description'], 10, '...') }}</p>

                                <small><i class="fa-solid fa-money-check-dollar text-primary"></i> {{ $item->price }}$
                                    /</small>

                                <small><i class="fa-solid fa-city text-danger"></i> {{ $item->address }} /</small>

                                <small><i class="fa-solid fa-star text-warning"></i> {{ $item->rating }}</small>

                                <div class="text-end mt-3">
                                    {{-- <a href="{{ url('post/delete/'.$item['id'])}}">
                            <button class="btn btn-outline-success"> <i class=" fa-sharp fa-solid fa-eraser"></i>Delete
                            </button>
                           </a> --}}
                                    <a href="{{ route('post#showmore', $item['id']) }}">
                                        <button class="btn btn-outline-danger">
                                            <i class="fa-solid fa-arrow-rotate-right"></i>See More
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3 class="text-danger text-center mt-5">There is no data...😢 </h3>
                    @endif
                </div>

            </div>
            {{ $posts->appends(request()->query())->links() }}
        </div>
    </div>

@endsection
