@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List film sedang tayang!</h1>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-sm-4 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="m-3">
                            <img src="{{ url('/image/'.$movie->banner) }}" style="width: 100%;">
                        </div>
                        <div>
                            <h3 class="text-center font-weight-bold" style="color: black"> {{ $movie->movie_title }}</h3>
                            <hr>
                            <p>
                                Genre: {{ $movie->genre }} <br>
                                Durasi: {{ $movie->durasi }} <br>
                                Sutradara: {{ $movie->sutradara }}
                            </p>
                            <a href="{{ route('preview', $movie->id) }}" class="btn btn-info w-100">Lihat Jadwal Film</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
