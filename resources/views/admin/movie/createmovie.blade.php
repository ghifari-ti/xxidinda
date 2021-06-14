@extends('layouts.sbadmin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Movie</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('movie.store')  }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Movie Title</label>
                    <input type="text" name="movie_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Genre (tekan enter untuk buat jadwal baru)</label>
                    <input type="text" name="genre" data-role="tagsinput" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Banner</label>
                    <input type="file" name="banner" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Duration</label>
                    <input type="text" name="durasi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Director</label>
                    <input type="text" name="sutradara" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Price</label>
                    <input type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Theater</label>
                    <select class="form-control" name="theater" id="moviename" required>
                        <option selected>Choose</option>
                        @foreach($theaters as $th)
                            <option value="{{$th->name}}">{{ $th->name }}</option>
                        @endforeach
                    </select>
                </div>
                <p>Available Schedules</p>
                <div id="sched" class="mb-3">

                </div>

                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
    <script>
        $(function()
        {
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
