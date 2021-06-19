@extends('layouts.sbadmin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>All Ticket</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Movie</th>
                    <th scope="col">Ticket</th>
                    <th scope="col">Schedule</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->user->name }}</td>
                        <td>{{ $ticket->movie->movie_title }}</td>
                        <td>{{ $ticket->kuantitas }}</td>
                        <td> {{ \Carbon\Carbon::make($ticket->tanggal)->format('m-d-Y') }} <br>
                            {{ $ticket->jadwal }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tickets->links() }}
        </div>
    </div>

@endsection
