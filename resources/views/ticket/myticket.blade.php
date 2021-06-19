@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Ticket</h1>
    <div class="row">
        @foreach($ticket as $tk)
            <div class="col-3">
                <div class="card mt-1">
                    <div class="card-body">
                        <h4 class="text-center">{{ $tk->movie->movie_title }}</h4>
                        <hr>
                        <p>Nama: {{ \Illuminate\Support\Facades\Auth::user()->name }} <br>
                            Jumlah Tiket: {{ $tk->kuantitas }} <br>
                            Theater: {{ $tk->theater->name }} <br>
                            Jam Tayang: <b>{{ $tk->jadwal }}</b> <br>
                            Tanggal: {{ \Carbon\Carbon::make($tk->jadwal)->toDateString() }}
                            <hr>
                            Harga: {{ number_format($tk->kuantitas * $tk->movie->harga) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
