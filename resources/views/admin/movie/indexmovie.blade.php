@extends('layouts.sbadmin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>List Movie</h3>
            <a href="{{ route('movie.create') }}" class="btn btn-info btn-sm">Add Movie</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Director</th>
                    <th scope="col">Theater</th>
                    <th scope="col">Schedule</th>
                    <th scope="col">Price</th>
                    <th scope="col">Act</th>

                </tr>
                </thead>
                <tbody>
                @foreach($movies as $mv)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td><img src="{{ url('/image/'.$mv->banner )}}" style="height: 50px;"> </td>
                        <td>{{ $mv->movie_title }}</td>
                        <td>{{ $mv->genre }}</td>
                        <td>{{ $mv->durasi }}</td>
                        <td>{{ $mv->sutradara }}</td>
                        <td>{{ $mv->theater }}</td>
                        <td>
                            @php
                                $times = explode(",", $mv->jadwal);
                            @endphp
                            @foreach($times as $time)
                                <span class="badge badge-info">{{ $time }}</span>
                            @endforeach
                        </td>
                        <td>{{ $mv->harga }}</td>
                        <td>
                            <a href="{{ route('movie.edit', $mv->id) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
