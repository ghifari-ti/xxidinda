@extends('layouts.sbadmin')

@section('content')
    <div class="card p-2">
        <div class="card-header">
            <h3>All User</h3>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Is Admin</th>
                <th scope="col">Act</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if($user->is_admin) Yes @else No @endif</td>
                    <td>
                        @if($user->email != \Illuminate\Support\Facades\Auth::user()->email) <a href="{{ url('/user/edit/'.$user->id) }}" class="btn btn-info">Edit</a> @else @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
