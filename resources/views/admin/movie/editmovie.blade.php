@extends('layouts.sbadmin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Movie</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('movie.update', $movie->id)  }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Movie Title</label>
                    <input type="text" name="movie_title" value="{{ $movie->movie_title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Genre (tekan enter untuk buat jadwal baru)</label>
                    <input type="text" name="genre" value="{{ $movie->genre }}" data-role="tagsinput" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Banner</label>
                    <input type="file" name="banner" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{ $movie->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Duration</label>
                    <input type="text" name="durasi" value="{{ $movie->durasi }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Director</label>
                    <input type="text" name="sutradara" value="{{ $movie->sutradara }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Price</label>
                    <input type="number" name="harga" value="{{ $movie->harga }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Theater</label>
                    <select class="form-control" name="theater" id="moviename" required>
                        <option value="{{ $movie->theater->id }}" selected>{{ $movie->theater->name }}</option>

                        @foreach($theaters as $th)
                            <option value="{{$th->id}}">{{ $th->name }}</option>
                        @endforeach
                    </select>
                </div>
                <p>Available Schedules</p>
                <div id="sched" class="mb-3">
                    @if($movie->jadwal)
                        @php
                            $times = explode(',', $movie->jadwal);
                        @endphp
                        @foreach($times as $time)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="jadwal[]" id="inlineCheckbox1" value="{{ $time }}" checked>
                                <label class="form-check-label" for="inlineCheckbox1">{{ $time }}</label>
                            </div> <br>
                        @endforeach
                    @endif
                </div>
                <div class="mb-3">
                    <label for="start" class="form-label">Start show</label>
                    <input type="text" name="start" value="{{ \Carbon\Carbon::make($movie->start)->format('m/d/Y') }}" class="form-control" id="start" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="end" class="form-label">End show</label>
                    <input type="text" name="end" value="{{ \Carbon\Carbon::make($movie->end)->format('m/d/Y') }}" class="form-control" id="end" aria-describedby="emailHelp" required>
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
    <script>
        $(function()
        {
            $('#start').datepicker()
            $('#end').datepicker()
            $('#moviename').on('change', function (event)
            {
                $('#sched').empty()
                event.preventDefault()
                $.ajax({
                    url: `{{ url('/getTime') }}/${this.value}`,
                    type: 'get',
                    success: (res) =>{
                        var times = JSON.parse(res)
                        if(times.length != 0)
                        {
                            times.forEach(time =>{
                                $('#sched').append(`<div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="jadwal[]" id="inlineCheckbox1" value="${time}">
                                        <label class="form-check-label" for="inlineCheckbox1">${time}</label>
                                        </div> <br>`)
                            })
                        } else {
                            $('#sched').append('No schedule available')
                        }
                    },
                    error: (err) => {
                        $('#sched').empty()
                    }
                })
            })
        });
    </script>
    @if(\Illuminate\Support\Facades\Session::get('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ \Illuminate\Support\Facades\Session::get('success') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
@endsection
