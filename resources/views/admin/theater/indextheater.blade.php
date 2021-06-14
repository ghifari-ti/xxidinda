@extends('layouts.sbadmin')

@section('content')
    <div class="card p-2">
        <div class="card-header">
            <h3>List Theater</h3>
            <div class="mt-1">
                <a href="{{ route('theater.create') }}" class="btn btn-primary btn-sm">Add Theater</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Capacity</th>
                <th scope="col">Type</th>
                <th scope="col">Schedule</th>
                <th scope="col">Act</th>

            </tr>
            </thead>
            <tbody>
            @foreach($theaters as $th)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $th->name }}</td>
                    <td>{{ $th->capacity }}</td>
                    <td>{{ $th->type }}</td>
                    <td>
                        @php
                            $times = explode(",", $th->jadwal);
                         @endphp
                        @foreach($times as $time)
                            <span class="badge badge-info">{{ $time }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('theater.edit', $th->id) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
