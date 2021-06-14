@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $movie->movie_title }}</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <img src="{{ url('/image/'.$movie->banner) }}" style="width: 100%;">
                </div>
                <div class="col">
                    <p><span class="font-weight-bold">Nama film:</span> {{ $movie->movie_title }} <br>
                        <span class="font-weight-bold">Genre:</span> {{ $movie->genre }} <br>
                        <span class="font-weight-bold">Sutradara:</span> {{ $movie->sutradara }} <br>
                        <span class="font-weight-bold">Deskripsi:</span> <br> {{ $movie->deskripsi }} <br>
                        <span class="font-weight-bold">Durasi:</span> {{ $movie->durasi }}<br>
                    </p>
                    <hr>
                    <p>
                        <span class="font-weight-bold">Theater:</span> {{ $movie->theater }} <br>
                        <span class="font-weight-bold">Harga:</span> Rp.{{ number_format($movie->harga) }} <br>
                        <span class="font-weight-bold">Jadwal hari ini:</span> <br>
                        @if($movie->jadwal)
                            @php
                                $times = explode(",", $movie->jadwal);
                            @endphp
                            @foreach($times as $time)
                                <span class="badge badge-info">{{ $time }}</span>
                            @endforeach
                        @else
                            <span class="font-weight-bold">Tidak ada jadwal penayangan</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
